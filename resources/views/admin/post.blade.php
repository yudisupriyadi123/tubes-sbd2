@extends('admin.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
var server = '{{ url("/") }}';
var list_pict = [];

/*block product*/
function open_step(no) {
    $('.post-popup').hide();
    $('#step-'+no).show();
    }
    function get_list() {
        alert(list_pict);
    }
    function post_finish() {
        window.location = '{{ url("/admin") }}';
    }

    /*block picture*/
    function remove_other_pict(no) {
        $("#place-image-"+no).remove();
        for (var i = 0; i < list_pict.length; i++) {
            if (list_pict[i] == no) {
                list_pict.splice(i, 1);
            }
        }
    }
    function add_other_pict(no) {
        var dt = '\
            <div class="place-image" id="place-image-'+no+'">\
                <input type="file" name="image-'+no+'" id="image-'+no+'" class="get-image" onchange="load_pict('+no+')">\
                    <label for="image-'+no+'" id="for-image-'+no+'">\
                        <div class="add fa fa-lg fa-plus"></div>\
                            </label>\
                                </div>';
$('#galery').append(dt);
    }
    function load_pict(no) {
        var OFReader = new FileReader();
        OFReader.readAsDataURL(document.getElementById("image-"+no).files[0]);
        OFReader.onload = function (oFREvent) {
            $("#place-image-"+no).addClass('add');
            $("#for-image-"+no).html('<div class="close fa fa-lg fa-close" onclick="remove_other_pict('+no+')"></div><img src="'+oFREvent.target.result+'" class="img" alt="'+oFREvent.target.result+'" id="image-url-'+no+'">');
            $("#for-image-"+no).removeAttr('for');
        }
        list_pict.push(no);
        add_other_pict((no+1));
    }
    function posting_pict_list(no, idposting)
    {
        var url_post = server+"/product/image";

        var fd = new FormData();
        var id = idposting;
        var file = $('#image-'+no)[0].files[0];

        fd.append('image', file);
        fd.append('product_id', id);

        $.each($('#form-image').serializeArray(), function(a, b) {
            fd.append(b.name, b.value);
        });

        $.ajax({
        url: url_post,
            data: fd,
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function() {
                opLoading('open', 'Uploading Image '+no);
            }
        })
        .done(function(rest) {
            if (rest == 'success') {
                opLoading('close', 'Everything was Done');
                open_step(2);
            } else {
                opLoading('close', 'Everything was Done');
                $('#btn-pict').val('Try Again');
            }
        })
        .fail(function() {
            console.log("error");
        });
    }

    function posting_pict() {
        var idposting = $('#idProduct').val();
        var len = list_pict.length;
        if (list_pict.length > 0) {
            for (var i = 0; i < list_pict.length; i++) {
                posting_pict_list(list_pict[i], idposting);
            }
        } else {
            alert('please choose an image');
        }
    }

    $(document).ready(function() {
        /*block product*/
        $('#post-product').submit(function(event) {
            var product_title = $('#product-title').val();
            var product_price = $('#product-price').val();
            var product_discount = $('#product-discount').val();
            var product_description = $('#product-description').html();
            var product_stock = $('#product-stock').val();
            var product_category = $('#product-category').val();

            $.ajax({
            url: '{{ url("/product/post") }}',
                type: 'post',
                data: {
                'title':product_title,
                    'price':product_price,
                    'discount':product_discount,
                    'description':product_description,
                    'stock':product_stock,
                    'category':product_category
                },
                beforeSend: function () {
                    opLoading('open', 'Updating Product..');
                }
            })
            .done(function(data) {
                if (data) {
                    $('#idProduct').val(data);
                    opLoading('close', 'Everything was Done');
                    open_step(1);
                } else {
                    alert('failed updating product.');
                    opLoading('close', 'Everything was Done');
                }
            })
            .fail(function(data) {
                opLoading('close', 'There is an Error.', 2000);
                $('#add-product').val('Try Again');
                alert('there is an error please try again');
            })
            .always(function() {
                opLoading('close', 'Everything was Done');
            });

        });

        /*block size*/
        $('#form-size').submit(function(event) {
            var size = $('#product-size').val();
            var product_id = $('#idProduct').val();
            $.ajax({
            url: '{{ url("/product/size") }}',
                type: 'post',
                data: {'size':size,'id':product_id},
                beforeSend: function() {
                    opLoading('close', 'Updating Product Sizes...');
                }
            })
            .done(function(data) {
                if (data == "success") {
                    $('#btn-size').val('Next');
                    opLoading('close', 'Everything was Done');
                    open_step(3);
                } else {
                    $('#btn-size').val('Try Again');
                    opLoading('close', 'Everything was Done');
                }
            })
            .fail(function() {
                opLoading('close', 'Everything was Done');
                alert('there is an error, please try again');
            });

        });

        /*block color*/
        $('#form-color').submit(function(event) {
            var color = $('#product-color').val();
            var product_id = $('#idProduct').val();
            $.ajax({
            url: '{{ url("/product/color") }}',
                type: 'post',
                data: {'color':color,'id':product_id},
                beforeSend: function() {
                    opLoading('close', 'Updating Product Colors...');
                }
            })
            .done(function(data) {
                if (data == "success") {
                    $('#btn-color').val('Next');
                    opLoading('close', 'Everything was Done');
                    open_step(4);
                    //updatting thumbnail image product
                    $.ajax({
                    url: '{{ url("/product/settingup") }}',
                        type: 'post',
                        data: {'id': product_id},
                        beforeSend: function () {
                            $('#step-4 .block').show();
                            $('#step-4 .btn').hide();
                        }
                    })
                    .done(function(dt) {
                        $('#step-4 .block').hide();
                        $('#step-4 .btn').show();
                    })
                    .fail(function() {
                        $('#step-4 .block').hide();
                        $('#step-4 .btn').show();
                    });

                } else {
                    $('#btn-color').val('Try Again');
                }
            })
            .fail(function() {
                opLoading('close', 'Everything was Done');
                alert('there is an error, please try again');
            });
        });

        $('#progressbar-product').progressbar({
        value: false,
        });
    });
</script>
<div class="compose">
    <input type="hidden" name="idProduct" id="idProduct" value="0">
    <div class="border-bottom">
        <h1>Add your Product</h1>
    </div>
    <div class="border-bottom">
        <span class="fa fa-lg fa-circle"></span>
        <span class="fa fa-lg fa-circle"></span>
        <span class="fa fa-lg fa-circle"></span>
    </div>
    <form id="post-product" action="javascript:void(0)">
        <div class="content">
            <div class="panel">
                <label class="ttl">Title *</label>
            </div>
            <div class="place">
                <input type="text" name="title" required="required" class="txt txt-main-color title" placeholder="" id="product-title">
            </div>
        </div>
        <div class="content">
            <div class="panel">
                <label class="ttl">Price *</label>
            </div>
            <div class="place">
                <input type="text" name="harga-1" required="required" class="txt txt-main-color title" placeholder="" id="product-price">
            </div>
        </div>
        <div class="content">
            <div class="panel">
                <label class="ttl">Discount</label>
            </div>
            <div class="place">
                <div class="facility">
                    <input type="text" name="harga-2" required="required" class="txt txt-main-color fs" placeholder="" id="product-discount">
                </div>
            </div>
        </div>
        <div class="content">
            <div class="panel">
                <label class="ttl">Description *</label>
            </div>
            <div class="place">
                <div contenteditable="true" required="required" class="txt txt-main-color deskripsi" id="product-description"></div>
            </div>
        </div>
        <div class="content">
            <div class="panel">
                <label class="ttl">Stock *</label>
            </div>
            <div class="place">
                <div class="facility">
                    <input type="text" name="fasilty" required="required" class="txt txt-main-color fs" placeholder="" id="product-stock">
                </div>
            </div>
        </div>
        <div class="content">
            <div class="panel">
                <label class="ttl">Category *</label>
            </div>
            <div class="place">
                <div class="facility">
                    <div class="select">
                        <select name="place" id="product-category">
                            @foreach ($category as $ctr)
                            <option value="{{ $ctr->id }}">{{ $ctr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom">
            <span class="fa fa-lg fa-circle"></span>
            <span class="fa fa-lg fa-circle"></span>
            <span class="fa fa-lg fa-circle"></span>
        </div>
        <div class="content">
            <div class="place">
                <input type="submit" name="submit" class="btn btn-main-color" value="Add Product" id="add-product">
            </div>
        </div>
        <div class="content border-bottom">
            <div class="place padding-bottom"></div>
        </div>
    </form>
    <div class="post-popup" id="step-1">
        <div class="place">
            <h2 id="ttl">Add Galeries of Product</h2>
            <form method="post" id="form-image" action="#" enctype="multipart/form-data">
                <div class="galeri" id="galery">
                    @for ($i=1; $i <= 1; $i++)
                    <div class="place-image" id="place-image-{{ $i }}">
                        <input type="file" name="image-{{ $i }}" id="image-{{ $i }}" class="get-image" onchange="load_pict({{ $i }})">
                        <label for="image-{{ $i }}" id="for-image-{{ $i }}">
                            <div class="add fa fa-lg fa-plus"></div>
                        </label>
                    </div>
                    @endfor
                </div>
            </form>
            <div id="bot">
                <input type="button" name="" value="Next" class="btn btn-main-color" id="btn-pict" onclick="posting_pict()">
            </div>
        </div>
    </div>
    <div class="post-popup" id="step-2">
        <form method="post" action="javascript:void(0)" id="form-size">
            <div class="place">
                <h2 id="ttl">Add Sizes of Product</h2>
                <div class="block">
                    <p>Example: S,M,L,XL,40,41,42..n (do not make a space)</p>
                    <div class="facility">
                        <input type="text" name="fasilty" class="txt txt-main-color fs" placeholder="" required="" id="product-size">
                    </div>

                </div>
                <div id="bot">
                    <input type="submit" name="" value="Next" class="btn btn-main-color" id="btn-size">
                </div>
            </div>
        </form>
    </div>
    <!--harus dikembangkan kembali belum userfriendly-->
    <div class="post-popup" id="step-3">
        <form method="post" action="javascript:void(0)" id="form-color">
            <div class="place">
                <h2 id="ttl">Add Colors of Product</h2>
                <div class="block">
                    <p>Example: red,black,white,..n (do not make a space)</p>
                    <div class="facility">
                        <input type="text" name="fasilty" class="txt txt-main-color fs" placeholder="" required="" id="product-color">
                    </div>

                </div>
                <div id="bot">
                    <input type="submit" name="" value="Next" class="btn btn-main-color" id="btn-color">
                </div>
            </div>
        </form>
    </div>

    <div class="post-popup" id="step-4">
        <div class="place">
            <h2 id="ttl">Setting Up your Product</h2>
            <div class="block">
                <div id="progressbar-product"></div>
            </div>
            <input type="button" name="" value="Finish" class="btn btn-main-color" id="btn-finish" onclick="post_finish()">
        </div>
    </div>

</div>
@endsection
