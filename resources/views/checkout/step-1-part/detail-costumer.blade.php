<!-- DIALOG FORM 1 -->
@include('checkout.step-1-part.dialog-form-create-new-address')
<!-- DIALOG FORM 2 -->
@include('checkout.step-1-part.dialog-form-choose-address')

<div class="mn">
    <div class="place-mn top">
        <h3>Detail Customer</h3>
    </div>
    <div id="shipping-address" class="place-mn mid">
        <!-- TODO: use last CSA -->
        No selected address
    </div>
    <div class="place-mn bot">
        <input type="button" name="new-address" class="btn btn-main-color-2" id="new-address" value="Add new Address">
        <input type="button" name="change-address" class="btn btn-main-color-2" id="change-address" value="Change Address">
    </div>
</div>

<script>
/* the documentReady is important here */
$(document).ready(function() {
// TODO: remove this
// var dtAddress = '<div class="block"><div class="ttl">Address</div><textarea class="txt txt-main-color textarea"></textarea></div>';
//
// $('#new-address').on('click', function(event) {
//     event.preventDefault();
//     /* Act on the event */
//     $('#address').append(dtAddress);
// });

/* ---------------------------------------------------------------------------
 |
 | Dialog to Create new Address
 | --------------------------------------------------------------------------- */
    var form;
    var address = $( ".dialog-form #address" );
    var kecamatan = $( ".dialog-form #kecamatan" );
    var kotamadya = $( ".dialog-form #kotamadya" );
    var provinsi = $( ".dialog-form #provinsi" );
    var postal_code = $( ".dialog-form #postal_code" );
    var receiver_name = $( ".dialog-form #receiver_name" );
    var receiver_phone_number = $( ".dialog-form #receiver_phone_number" );
    var allFields = $( [] )
                            .add( kecamatan )
                            .add( kotamadya )
                            .add( provinsi )
                            .add( postal_code )
                            .add( receiver_name )
                            .add( receiver_phone_number );
    var tips = $( ".validateTips" );

    // Costumer shipping address
    function addCSA() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            },
            method: 'POST',
            url: 'http://localhost/tubes-sbd/public/index.php/ajax/add-csa',
            data: {
                address: address.val(),
                kecamatan: kecamatan.val(),
                kotamadya: kotamadya.val(),
                provinsi: provinsi.val(),
                postal_code: postal_code.val(),
                receiver_name: receiver_name.val(),
                receiver_phone_number: receiver_phone_number.val(),
            },
            dataType: 'json',
        }).done(function(res){
            $("#shipping-address").html(res.html);
            return true;
        }).fail(function(err){
            console.log(err);
            return false;
        });
    }

    var dialog = $( "#dialog-form" ).dialog({
        autoOpen: false,
        height: 400,
        width: 350,
        modal: true,
        buttons: {
            "Create Address": function(){
                addCSA();
                $( this ).dialog( "close" );
            },
            Cancel: function() {
                  dialog.dialog( "close" );
            }
        },
        close: function() {
            form[ 0 ].reset();
            allFields.removeClass( "ui-state-error" );
        }
    });

    form = dialog.find( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        addCSA();
    });

    $("#new-address").click(function(){
        dialog.dialog( "open" );
    });

/* ---------------------------------------------------------------------------------
 |
 | Dialog to Choose Address That Already Exists
 |----------------------------------------------------------------------------------*/
    function selectCSA() {
        var elm = $(".shipping-address.clicked");

        var shipping_address = elm.html();
        $("#shipping-address").html(shipping_address);

        var csa_id = elm.data('csa-id');
        $("form#primary").find("input[name=csa_id]").val(csa_id);
    }

    $("#dialog-form2").on("click", ".shipping-address", function(){
        $(".shipping-address").removeClass('clicked');
        $(this).addClass('clicked')
    });

    var dialog2 = $( "#dialog-form2" ).dialog({
        autoOpen: false,
        height: 400,
        width: 500,
        modal: true,
        buttons: {
            Select: function() {
                selectCSA();
                $( this ).dialog( "close" );
            },
            Cancel: function() {
                  dialog.dialog( "close" );
            }
        },
        close: function() {
            console.log('test');
        },
        open: function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                method: 'POST',
                url: 'http://localhost/tubes-sbd/public/index.php/ajax/get-all-csa',
                data: {
                    'costumer_email': 'fake_costumer@gmail.com'
                },
                dataType: 'json',
            }).done(function(res){
                $("#dialog-form2 .content").html(res.html);
                return true;
            }).fail(function(err){
                console.log(err);
                return false;
            });
        }
    });

    $("#change-address").click(function(){
        dialog2.dialog( "open" );
    });
});
</script>
