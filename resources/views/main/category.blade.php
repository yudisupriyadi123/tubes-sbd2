<div class="menu-main-ctr">
    <ul class="tab-group">
        <li class="tab active">
            <a data-target-tab="pria">Pria</a></li>
        <li class="tab">
            <a data-target-tab="wanita">Wanita</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="pria-tab">
            <div class="ctr-head">Top Choices Pria</div>
            <ol>
                <a href="{{ url('/recent') }}">
                    <li>
                        <label class="icn fa fa-lg fa-clock-o"></label>
                        <label class="ttl">Recently Posts</label>
                    </li>
                </a>
                <a href="{{ url('/popular') }}">
                    <li>
                        <label class="icn fa fa-lg fa-line-chart"></label>
                        <label class="ttl">Popular Posts</label>
                    </li>
                </a>
                <a href="{{ url('/top') }}">
                    <li>
                        <label class="icn fa fa-lg fa-fire"></label>
                        <label class="ttl">Most Viewed</label>
                    </li>
                </a>
                <a href="{{ url('/shops') }}">
                    <li>
                        <label class="icn fa fa-lg fa-shopping-bag"></label>
                        <label class="ttl">All Products</label>
                    </li>
                </a>
            </ol>
            <div class="ctr-head">All Categories</div>
            <ol>
                @for ($i=1; $i <= 15; $i++)
                <a href="{{ url('/category/ctr'.$i) }}">
                    <li>
                        <label class="icn fa fa-lg fa-shopping-bag"></label>
                        <label class="ttl">category {{ $i }}</label>
                    </li>
                </a>
                @endfor
            </ol>
            <div class="ctr-head">Tranding Nows</div>
            <ol>
                @for ($i=1; $i <= 5; $i++)
                <a href="{{ url('/tags/ctr'.$i) }}">
                    <li>
                        <label class="icn fa fa-lg fa-star"></label>
                        <label class="ttl">Tags {{ $i }}</label>
                    </li>
                </a>
                @endfor
            </ol>
        </div>

        <div class="wanita-tab">
            <div class="ctr-head">Top Choices Wanita</div>
            <ol>
                <a href="{{ url('/recent') }}">
                    <li>
                        <label class="icn fa fa-lg fa-clock-o"></label>
                        <label class="ttl">Recently Posts</label>
                    </li>
                </a>
                <a href="{{ url('/popular') }}">
                    <li>
                        <label class="icn fa fa-lg fa-line-chart"></label>
                        <label class="ttl">Popular Posts</label>
                    </li>
                </a>
                <a href="{{ url('/top') }}">
                    <li>
                        <label class="icn fa fa-lg fa-fire"></label>
                        <label class="ttl">Most Viewed</label>
                    </li>
                </a>
                <a href="{{ url('/shops') }}">
                    <li>
                        <label class="icn fa fa-lg fa-shopping-bag"></label>
                        <label class="ttl">All Products</label>
                    </li>
                </a>
            </ol>
            <div class="ctr-head">All Categories</div>
            <ol>
                @for ($i=1; $i <= 15; $i++)
                <a href="{{ url('/category/ctr'.$i) }}">
                    <li>
                        <label class="icn fa fa-lg fa-shopping-bag"></label>
                        <label class="ttl">category {{ $i }}</label>
                    </li>
                </a>
                @endfor
            </ol>
            <div class="ctr-head">Tranding Nows</div>
            <ol>
                @for ($i=1; $i <= 5; $i++)
                <a href="{{ url('/tags/ctr'.$i) }}">
                    <li>
                        <label class="icn fa fa-lg fa-star"></label>
                        <label class="ttl">Tags {{ $i }}</label>
                    </li>
                </a>
                @endfor
            </ol>
        </div>
    </div>
</div>

<script>
/* source: https://codepen.io/ehermanson/pen/KwKWEv */
$('.tab a').on('click', function (e) {
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  target = '.' + $(this).data('target-tab') + '-tab';

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});
</script>