@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
  $(document).ready(function() {
    $('#panel-post .ntf').click(function(event) {
      $('#panel-post .ntf').each(function(index, el) {
        $(this).removeClass('notif-selected');
      });
      $(this).addClass('notif-selected');
      var cl = $(this).attr('id');
      if (cl === 'deskripsi') {
        $('#ctn-deskripsi').show();
        $('#ctn-review').hide();
      }
      else {
        $('#ctn-deskripsi').hide();
        $('#ctn-review').show();
      }
      return false;
    });

    $('#desc-panel ul li').on('click', function(event) {
      event.preventDefault();
      $('#desc-panel ul li').each(function(index, el) {
        $(this).removeClass('desc-panel-select');
      });
      $(this).addClass('desc-panel-select');
      var target = $(this).attr('key');

      $('.description-post .main .content').each(function(index, el) {
        $(this).removeClass('content-show');
      });
      $('#'+target).addClass('content-show');
    });

    var qty_cost_min = 1;
    var qty_cost_max = 9;
    $('#qty-min').on('click', function(event) {
      var new_qty = (parseInt($('#qty').val()) - 1);
      if (new_qty <= 1) {
        $('#qty').val(qty_cost_min);
      } else {
        $('#qty').val(new_qty);
      }
    });
    $('#qty-plus').on('click', function(event) {
      var new_qty = (parseInt($('#qty').val()) + 1);
      if (new_qty >= qty_cost_max) {
        $('#qty').val(qty_cost_max);
      } else {
        $('#qty').val(new_qty);
      }

    });

    /* --------------------------------------------------------------------------
     |
     |
     | -------------------------------------------------------------------------- */

    // mengandung data keranjang yang akan dikirim ke server
    var json = {size: null, color: null, quantity: null, product_id: null, cart_id: -1};

    $(".btn-color").click(function(){
      $(".btn-color").removeClass("selected");
      $(this).addClass("selected");
      if (json.cart_id == -1) return; // not needed to update DB
      updateJson();
    });
    $(".btn-size").click(function(){
      $(".btn-size").removeClass("selected");
      $(this).addClass("selected");
      if (json.cart_id == -1) return;
      updateJson();
    });

    $("#btn-addto-cart").click(function(){
      updateJson();
    });

    function updateJson() {
      // this is important, don't change assign form of json object below (see line 104)
      json.size = $(".btn-size.selected").data('id') || null,
      json.color = $(".btn-color.selected").data('id') || null,
      json.quantity = $("input[name=qty]").val(),
      json.product_id = {{ $product->id }},
      json.cart_id = json.cart_id || null,
      sendToServer();
    }

    function sendToServer() {
      // HATI-HATI: apakah index.php terikuti atau tidak, mungkin bergantung pada URL yang diakses user
      var destination = json.cart_id == -1 ? '{{ url('/ajax/add-to-cart') }}' : '{{ url('ajax/update-cart') }}';
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
          },
          method: 'POST',
          // TODO: penting. atur agar tidak memakai fixed url gini
          url: destination,
          data: json,
          dataType: 'json',
      }).done(function(res){
          if (res.status == 'OK') {
            alert('Telah disimpan ke keranjang');
            json.cart_id = res.cart_id; // take successful saved cart_id from server
          }
          if (res.status == 'ERR') alert('Gagal menyimpan: ',  res.message);
      }).fail(function(err){
          alert('FAIL');
      });
    }
});
</script>

<div class="view-post main-width">

  <div class="content-post">
    <div class="main-post" style="background-image: url('{{ asset($product_thumbnail->image) }}');"></div>
    <div class="side-post">
      <div class="other-picts">
        @foreach ($product_images as $key => $image)
          <div class="view-picts" style="background-image: url('{{ asset($image->image) }}');"></div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="description-post">
    <div class="main">

      <div class="desc-panel" id="desc-panel">
        <ul>
          <li class="desc-panel-select" key="info">Product</li>
            <li key="desc">Descriptions</li>
            <li key="other">Detail</li>
            <li key="feed-back">Feed Back</li>
        </ul>
      </div>

      <div class="content content-show" id="info">
        <div class="header-post">
          <h1>{{ $product->name }}</h1>
          <div class="post-bot">
            <div class="locate">
              <label class="fa fa-lg fa-user"></label>
              <label class="val"> Admin 1</label>
            </div>
            <div class="locate">
              <label class="fa fa-lg fa-clock-o"></label>
              <label class="val">Published on {{ $product->created_at }}</label>
            </div>
          </div>
          <div class="idr">
            <div class="ttl">IDR: {{ $product->price-($product->price*($product->discount_in_percent/100)) }}</div>
            <div class="ttl2">IDR: {{ $product->price }}</div>
          </div>
          <div class="size need-p">
            <p><b>Available size on</b></p>
            @foreach ($product_sizes as $key => $size)
              <button data-id="{{ $size->id }}" type="button" class="btn btn-size">{{ $size->size }}</button>
            @endforeach
          </div>
          <div class="color need-p">
            <p><b>Availble color on</b></p>
            @foreach ($product_colors as $key => $color)
              <button data-id="{{ $color->id }}" class="btn btn-color" style="background-color: {{ $color->color }};"></button>
            @endforeach
          </div>
          <div class="stock need-p">
            <p><b>Available on <clr> {{ $product->stock }} Stock </clr> Products</b></p>
            <p>Put count of product that you want</p>
            <div class="place-stock">
              <button class="op btn-qty" id="qty-min">
                <label class="fa fa-lg fa-minus"></label>
              </button>
              <input type="text" name="qty" class="op txt" placeholder="qty" value="1" id="qty" readonly="true">
              <button class="op btn-qty" id="qty-plus">
                <label class="fa fa-lg fa-plus"></label>
              </button>
            </div>
          </div>
          <div class="post-btn">
            @if ($product->stock > 0)
            <button class="btn btn-main-color" id="btn-addto-cart">
              <label class="fa fa-lg fa-shopping-cart"></label>
              <label>Add to Cart</label>
            </button>
            @else
            <button class="btn btn-main-color">
              <label class="fa fa-lg fa-shopping-cart"></label>
              <label>Out of stock</label>
            </button>
            @endif
            <!--id nya harus diganti-->
            <a href="#">
              <button class="btn btn-main-color-2">
                <!-- <label class="fa fa-lg fa-money"></label> -->
                <label>|<!-- Order Now --></label>
              </button>
            </a>
          </div>
        </div>
      </div>

      <div class="content" id="desc">
        <h2>Descriptions</h2>
        <p>{{ $product->description }}</p>
      </div>
      <div class="content" id="other">
        <h2>Details Product</h2>
        <ul>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
        </ul>
        <h2>Details Product</h2>
        <ul>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
        </ul>
        <h2>Details Product</h2>
        <ul>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
            <li>
              <label class="fa fa-lg fa-circle"></label>
              This is just for a Test.
            </li>
        </ul>
      </div>
      <!--
      <div class="content" id="location">
        <h2>Location</h2>
        <div class="location fa fa-lg fa-map-marker"></div>
      </div>
      -->
      <div class="content" id="feed-back">
        <div class="border-bottom"></div>
        <form>
          <!--<textarea name="comment" class="textarea" placeholder="Write Comment ..." required></textarea>-->
          <input type="text" name="comment" class="txt txt-big-padding" placeholder="Write Feed Back ..." required>
        </form>
        <div class="comment-content">
          <div class="frame-comment comment-guess">
            <div class="desk comment-guess-radius">
              <b>Guess</b> This is just for example.
            </div>
            <div class="tgl">
              10/11/2017 10:00 pm
            </div>
          </div>

          <div class="frame-comment comment-owner">
            <div class="desk comment-owner-radius">
              <b>Owner</b> This is just for example. This is just for example.This is just for example.This is just for example.This is just for example.
            </div>
            <div class="tgl">
              10/11/2017 10:00 pm
            </div>
          </div>

          <div class="frame-comment comment-guess">
            <div class="desk comment-guess-radius">
              <b>Guess</b> This is just for example.
            </div>
            <div class="tgl">
              10/11/2017 10:00 pm
            </div>
          </div>
          <div class="frame-comment comment-guess">
            <div class="desk comment-guess-radius">
              <b>Guess</b> This is just for example.
            </div>
            <div class="tgl">
              10/11/2017 10:00 pm
            </div>
          </div>

          <div class="frame-comment comment-owner">
            <div class="desk comment-owner-radius">
              <b>Owner</b> This is just for example. This is just for example.This is just for example.This is just for example.This is just for example.
            </div>
            <div class="tgl">
              10/11/2017 10:00 pm
            </div>
          </div>

          <div class="frame-comment comment-guess">
            <div class="desk comment-guess-radius">
              <b>Guess</b> This is just for example.
            </div>
            <div class="tgl">
              10/11/2017 10:00 pm
            </div>
          </div>
          <div class="frame-comment comment-guess">
            <div class="desk comment-guess-radius">
              <b>Guess</b> This is just for example.
            </div>
            <div class="tgl">
              10/11/2017 10:00 pm
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="side">

    </div>
  </div>
</div>
  <div class="home-content main-width">
    <div class="home-panel">
      <div class="panel-title">
        RELATED POSTS
      </div>
    </div>
    <div class="home-products grid-5 scroll-left">
    {{-- TODO: remove
    @foreach ($s as $key => $product)
      @include('main.product')
    @endforeach
    --}}
    </div>
  </div>
@endsection
