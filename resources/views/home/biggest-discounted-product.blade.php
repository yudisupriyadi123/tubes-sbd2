<div class="home-content main-width">
    <div class="home-panel">
        <div class="panel-title">
            BIGGEST DISCOUNT PRODUCTS
        </div>
    </div>
    <div class="home-products grid-5 scroll-left">
        @foreach ($biggest_discount_products as $key => $product)
            @include('main.product')
        @endforeach
    </div>
</div>
