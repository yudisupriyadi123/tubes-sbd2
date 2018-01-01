<div class="home-content main-width">
    <div class="home-panel">
        <div class="panel-title">
            NEWEST PRODUCTS
        </div>
    </div>
    <div class="home-products grid-5 scroll-left">
        @foreach ($newest_products as $key => $product)
            @include('main.product')
        @endforeach
    </div>
</div>
