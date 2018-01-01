<div class="main">

    <div class="mn">
        <div class="place-mn top">
            <h3>Detail Products</h3>
        </div>
        <div class="mid">
            @foreach ($cart_items as $key => $cart_item)
            <input type="hidden" name="cart_ids[]" value="{{ $cart_item->cart_id }}">
            <div class="frame-cart">
                <div class="top">
                    <span class="cek left">
                        <button class="btn btn-white-color">
                            <div class="fa fa-lg fa-circle"></div>
                        </button>
                        <span>By Admin</span>
                    </span>
                </div>
                <div class="mid-cart">
                    <div class="mid-1">
                        <div class="image-cart" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
                    </div>
                    <div class="mid-2">
                        <div class="ttl">
                            {{ $cart_item->product_name }}
                        </div>
                        <div class="place-stock">
                            <button class="op btn-qty" id="qty-min">
                                <label class="fa fa-lg fa-minus"></label>
                            </button>
                            <input type="text" name="qty" class="op txt" placeholder="qty" value="{{ $cart_item->cart_quantity }}" id="qty" readonly>
                            <button class="op btn-qty" id="qty-plus">
                                <label class="fa fa-lg fa-plus"></label>
                            </button>
                        </div>
                    </div>
                    <div class="mid-3">
                        <span>IDR {{ $cart_item->product_price_discount * $cart_item->cart_quantity }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="bot">
            <div class="block block-address" id="address">
                <div class="block">
                    <div class="ttl">
                        Notes
                    </div>
                    <textarea class="txt txt-main-color textarea"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="mn">
        <div class="place-mn top">
            <h3>Choose Courier</h3>
        </div>
        <div class="place-mn">
            <div class="block">
                <div class="ttl">
                    <!-- empty -->
                </div>
                <select name="courier" class="select">
                    <option value="">Select Courier</option>
                    <option value="JNE">JNE</option>
                    <option value="JNE">TIKI</option>
                    <option value="JNE">J&T</option>
                </select>
            </div>
        </div>
    </div>

</div>
