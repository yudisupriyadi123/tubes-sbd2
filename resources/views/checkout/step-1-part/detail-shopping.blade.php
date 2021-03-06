<div class="side">
    <div class="mn cart-fixed">
        <div class="place-mn top">
            <h3>Detail Shopping</h3>
        </div>
        <div class="mid">
            <div class="mn-detail">
                <div class="mn-detail-left">
                    Price Product
                </div>
                <div class="mn-detail-right">
                    <?php
                    $total_price = 0;
                    foreach ($cart_items as $k => $cart_item) {
                        $total_price += $cart_item->getTotalPrice();
                    } ?>
                    <b>IDR {{ $total_price }}</b>
                </div>
            </div>
            <div class="mn-detail">
                <div class="mn-detail-left">
                    Payment Shipping
                </div>
                <div class="mn-detail-right">
                    <b>IDR 10.000</b>
                </div>
            </div>
        </div>
        <div class="bot">
            <div class="mn-detail">
                <div class="mn-detail-left">
                    Total Payment
                </div>
                <div class="mn-detail-right">
                    <b class="ttl">IDR {{ $total_price + 10000 }}</b>
                </div>
            </div>
            <button class="btn btn-main-color">Submit your Order</button>
            <p id="submit-hint"></p>
        </div>
    </div>
</div>
