<?php use App\CategoryModel; ?>
<div class="menu-main-ctr">
    <div class="ctr-head">Top Chooices</div>
    <ol>
        <a href="{{ url('/recent') }}">
            <li>
                <label class="icn fa fa-lg fa-clock-o"></label>
                <label class="ttl">Recently Posts</label>
            </li>
        </a>
        <a href="{{ url('/discount') }}">
            <li>
                <label class="icn fa fa-lg fa-percent"></label>
                <label class="ttl">Bigest Discounted</label>
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
        @foreach (CategoryModel::Get() as $ctr)
        <a href="{{ url('/category?idctr='.$ctr->id.'&name='.$ctr->name) }}">
            <li>
                <label class="icn fa fa-lg fa-th"></label>
                <label class="ttl">{{ $ctr->name }}</label>
            </li>
        </a>
        @endforeach
    </ol>
</div>
