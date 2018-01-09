@extends('admin.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
$(document).ready(function() {
    $('#costumer-panel ul li').on('click', function(event) {
        event.preventDefault();
        $('#costumer-panel ul li').each(function(index, el) {
            $(this).removeClass('desc-panel-select');
            });
            $(this).addClass('desc-panel-select');
            var target = $(this).attr('key');

            $('#costumer-content .ctn').each(function(index, el) {
                $(this).attr('class', 'ctn ctn-hide');
            });
            $('#'+target).attr('class', 'ctn ctn-show');
        });
    });
</script>
<div class="main-admin">
    <!--profile disini ada dua kolom, kolom yang kedua bisa dihapus dan hanya menggunakan kolom pertama yaitu profile dari admin-->
    <div class="costumer">
        <div class="side">
            <div class="mn profile">
                <div class="top">
                    <div class="image" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
                </div>
                <div class="mid">
                    <ul>
                        <li>
                            <span><h2>Ganjar Hadiatna</h2></span>
                        </li>
                        <li>
                            <span class="icn fa fa-lg fa-user"></span>
                            <span>Admin</span>
                        </li>
                        <li>
                            <span class="icn fa fa-lg fa-envelope"></span>
                            <span>ganjarhadiatna.gh@gmail.com</span>
                        </li>
                        <li>
                            <span class="icn fa fa-lg fa-map-marker"></span>
                            <span>Address</span>
                        </li>
                    </ul>
                </div>
                <div class="bot">
                    <ul>
                        <li>
                            <span class="icn fa fa-lg fa-gear"></span>
                            <span>Setting</span>
                        </li>
                        <li>
                            <span class="icn fa fa-lg fa-power-off"></span>
                            <span>Logout</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main" id="costumer-content">
            <!--
            <div class="mn place">
                <div class="desc-panel" id="costumer-panel">
                    <ul>
                        <li class="desc-panel-select" key="all">Your Posts</li>
                        <li key="conf">Confirmed</li>
                        <li key="proc">Process</li>
                        <li key="feed-back">Feed Back</li>
                    </ul>
                </div>
            </div>
            -->
            <!--on confirmed-->
            <div class="ctn ctn-show" id="all">
                @foreach ($products as $product)
                <div class="mn place">
                    <div class="frame-cart">
                        <div class="mid-cart">
                            <div class="mid-1">
                                <div class="image-cart" style="background-image: url('{{ url('/').'/'.$product->image }}');"></div>
                            </div>
                            <div class="mid-2">
                                <div class="ttl" style="font-size: 18px;">
                                    <b>{{ $product->name }}</b>
                                </div>
                                <div class="total-order" style="font-size: 15px;">
                                    {{ 'IDR '.$product->price }}
                                </div>
                            </div>
                        </div>
                        <div class="bot-cart">
                            <div class="sub">
                                <div>Stock: <b>{{ $product->stock }}</b></div>
                                <div class="sh">Published on {{ $product->created_at }}</div>
                            </div>
                            <div class="pur">
                                <a href="{{ url('/order/'.$product->id.'/detail') }}">
                                    <input type="button" name="purchase" class="btn btn-white-color-red" value="On Sale">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="ctn ctn-hide" id="conf">
                @for ($i=1; $i < 3; $i++)
                <div class="mn place">
                    <div class="frame-cart">
                        <div class="top">
                            <span class="cek left">
                                <span class="fa fa-lg fa-user-circle"></span>
                                <!--Nama pembeli-->
                                <span>Name of Costumer</span>
                            </span>
                            <span class="right">
                                <button class="btn btn-white-color-red">
                                    Detail
                                </button>
                            </span>
                        </div>
                        <div class="mid-cart">
                            <div class="mid-1">
                                <div class="image-cart" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
                            </div>
                            <div class="mid-2">
                                <div class="ttl">
                                    The title product will be in here.
                                </div>
                                <div class="total-order">
                                    <span>Total Order</span>
                                    <span>3 Products</span>
                                </div>
                            </div>
                            <div class="mid-3">
                                <span>IDR 350,000,00</span>
                            </div>
                        </div>
                        <div class="bot-cart">
                            <div class="sub">
                                <div>Subtotal: <b>IDR 350,000,00</b></div>
                                <div class="sh">Shipping not included</div>
                            </div>
                            <div class="pur">
                                <a href="{{ url('/order/'.$i.'/detail') }}">
                                    <input type="button" name="purchase" class="btn btn-white-color-red" value="Confirmed">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <!--on process-->
            <div class="ctn ctn-hide" id="proc">
                @for ($i=1; $i < 2; $i++)
                <div class="mn place">
                    <div class="frame-cart">
                        <div class="top">
                            <span class="cek left">
                                <span class="fa fa-lg fa-user-circle"></span>
                                <!--Nama pembeli-->
                                <span>Name of Costumer</span>
                            </span>
                            <span class="right">
                                <button class="btn btn-white-color-red">
                                    Detail
                                </button>
                            </span>
                        </div>
                        <div class="mid-cart">
                            <div class="mid-1">
                                <div class="image-cart" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
                            </div>
                            <div class="mid-2">
                                <div class="ttl">
                                    The title product will be in here.
                                </div>
                                <div class="total-order">
                                    <span>Total Order</span>
                                    <span>3 Products</span>
                                </div>
                            </div>
                            <div class="mid-3">
                                <span>IDR 350,000,00</span>
                            </div>
                        </div>
                        <div class="bot-cart">
                            <div class="sub">
                                <div>Subtotal: <b>IDR 350,000,00</b></div>
                                <div class="sh">Shipping not included</div>
                            </div>
                            <div class="pur">
                                <a href="{{ url('/order/'.$i.'/detail') }}">
                                    <input type="button" name="purchase" class="btn btn-white-color-red" value="On Process">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div class="ctn ctn-hide" id="feed-back">
                @for ($i=1; $i < 5; $i++)
                <div class="mn place">
                    <div class="frame-cart">
                        <div class="mid-cart">
                            <div class="mid-1">
                                <div class="image-cart" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
                            </div>
                            <div class="mid-2">
                                <div class="ttl">
                                    The title product will be in here.
                                </div>
                                <div class="total-order">
                                    <span>Your Feed Back will show in here</span>
                                </div>
                            </div>
                            <div class="mid-3">
                                <span class="sh">by Admin</span>
                            </div>
                        </div>
                        <div class="bot-cart">
                            <div class="sub">
                                <div>Price: <b>IDR 150,000,00</b></div>
                                <div class="sh">On Sale</div>
                            </div>
                            <div class="pur feed">
                                <button class="btn btn-white-color-red">35 Feeds Back</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

        </div>
    </div>
</div>
@endsection
