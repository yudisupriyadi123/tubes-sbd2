<div class="home-content main-width">
    <div class="home-panel">
        <div class="panel-title">
            All Products
        </div>
    </div>
    <div class="home-products grid-5 scroll-left">
        @foreach ($all_product as $key => $product)
            @include('main.product')
        @endforeach
    </div>
</div>
