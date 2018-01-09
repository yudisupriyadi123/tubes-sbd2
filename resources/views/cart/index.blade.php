@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
    $(document).ready(function() {
        $(document).scroll(function(event) {
            var top = $(this).scrollTop();
            if (top > 50) {
                $('#all-shipping').addClass('cart-fixed');
            }
            else {
                $('#all-shipping').removeClass('cart-fixed');
            }
        });

        // TODO: make ajax request more efficient
        $(".btn-qty").click(function(){
            var parentElm = $(this).closest(".mn.mid");
            var cart_id = parentElm.find("input[name^=cart_ids]").val();
            var qtyElm = parentElm.find("input[name=qty]");

            if ($(this).attr('id') == 'qty-min' && qtyElm.val() > 1) qtyElm.val(parseInt(qtyElm.val())-1);
            if ($(this).attr('id') == 'qty-plus') qtyElm.val(parseInt(qtyElm.val())+1);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                method: 'POST',
                url: 'http://localhost/tubes-sbd/public/index.php/ajax/on-change-quantity-cart-item',
                data: {
                    'cart_id': cart_id,
                    'qty': qtyElm.val(),
                },
                dataType: 'json',
            }).done(function(res){
                parentElm.find(".subtotal").text(res.subtotal_price);
            }).fail(function(err){
                console.log(err);
            });
        });

        var total_price = 0;
        $("input[name^=cart_ids]").attr('disabled', true);
        $(".ck.ckbox").click(function(){
            var parentElm = $(this).closest(".mn.mid");
            if ($(this).prop('checked') == true) {
                parentElm.find("input[name^=cart_ids]").attr('disabled', false);
                total_price += parseInt(parentElm.find("input[name=total_price]").val());
                $("#total-price").text(total_price);
            } else {
                parentElm.find("input[name^=cart_ids]").attr('disabled', true);
                total_price -= parseInt(parentElm.find("input[name=total_price]").val());
                $("#total-price").text(total_price);
            }
            if (total_price == 0) $("#total-price").text('000,000,00');
        });

        // TODO: use more correct logic
        $(".ckbox-all").click(function(){
            $(".ck.ckbox").trigger('click');
        })

        $(".btn-choose").click(function(){
            var parentElm = $(this).closest(".mn.mid");
            parentElm.find(".ck.ckbox").trigger('click');
        });
    });
</script>
<form method="post" action="{{url('checkout/step1')}}">
{{ csrf_field() }}
<div class="main-width">
    <h1>Shopping Cart</h1>
    <div class="main-cart">
        <div class="main">
            <div class="mn top">
                <span class="cek left">
                    <input type="checkbox" class="ck ckbox-all" value="false">
                    <span>Select All Orders</span>
                </span>
                <span class="right">
                    <input type="button" name="delete_all" class="btn btn-white-color-red" value="Dellete All">
                </span>
            </div>
            @foreach ($cart_items as $key => $cart_item)
            <div class="mn mid">
                <input type="hidden" name="cart_ids[]" value="{{ $cart_item->id }}">
                <input type="hidden" name="total_price" value="{{ $cart_item->getTotalPrice() }}">

                <div class="frame-cart">
                    <div class="top">
                        <span class="cek left">
                            <input type="checkbox" class="ck ckbox" value="false">
                            <span>Select this</span>
                        </span>
                        <span class="right">
                            <button type="button" class="btn btn-white-color">
                                <div class="fa fa-lg fa-close"></div>
                            </button>
                        </span>
                    </div>
                    <div class="mid-cart">
                        <div class="mid-1">
                            <div class="image-cart" style="background-image: url('{{ asset($cart_item->product->thumbnail->image) }}');"></div>
                        </div>
                        <div class="mid-2">
                            <div class="ttl">
                                {{ $cart_item->product->name }}
                            </div>
                            <div class="place-stock">
                                <button type="button" class="op btn-qty" id="qty-min">
                                    <label class="fa fa-lg fa-minus"></label>
                                </button>
                                <input type="text" name="qty" class="op txt" placeholder="qty" value="{{ $cart_item->quantity }}" id="qty" readonly>
                                <button type="button" class="op btn-qty" id="qty-plus">
                                    <label class="fa fa-lg fa-plus"></label>
                                </button>
                            </div>
                        </div>
                        <div class="mid-3">
                            <span>IDR {{ $cart_item->product->price }}</span>
                        </div>
                    </div>
                    <div class="bot-cart">
                        <div class="sub">
                            <div>Subtotal: <b class="subtotal">IDR {{ $cart_item->getTotalPrice() }} </b></div>
                            <div class="sh">Shipping not included</div>
                        </div>
                        <div class="pur">
                            <input type="button" class="btn btn-main-color btn-choose" value="Choose">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="side">
            <div class="mn total-shipping" id="all-shipping">
                <div class="top">
                    <b>Purchase All Transactions</b>
                </div>
                <div class="mid">
                    <div class="sub">
                        <label class="ttl">Total Shopping</label>
                        <label class="sh"><b>IDR <span id="total-price">000,000,00</span></b></label>
                    </div>
                    <div class="pur">

                        <button type="submit" class="btn btn-main-color">Purchase All</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</form>
@endsection
