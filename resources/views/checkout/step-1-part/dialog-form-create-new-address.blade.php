<div id="dialog-form" class="dialog-form" title="Create new shipping address">
  <p class="validateTips">All form fields are required.</p>

<form id="new-address-form" method="post" action="javascript:void(0)">
    <fieldset>
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="text ui-widget-content ui-corner-all">

        <label for="kecamatan">Kecamatan</label>
        <input type="text" name="kecamatan" id="kecamatan" class="text ui-widget-content ui-corner-all">

        <label for="kotamadya">Kotamadya</label>
        <input type="text" name="kotamadya" id="kotamadya" class="text ui-widget-content ui-corner-all">

        <label for="provinsi">Provinsi</label>
        <input type="text" name="provinsi" id="provinsi" class="text ui-widget-content ui-corner-all">

        <label for="postal_code">Postal code</label>
        <input type="text" name="postal_code" id="postal_code" class="text ui-widget-content ui-corner-all">

        <label for="receiver_name">Receiver Name</label>
        <input type="text" name="receiver_name" id="receiver_name" class="text ui-widget-content ui-corner-all">

        <label for="receiver_phone_number">Receiver Phone Number</label>
        <input type="text" name="receiver_phone_number" id="receiver_phone_number" class="text ui-widget-content ui-corner-all">

        <!-- Allow form submission with keyboard without duplicating the dialog button -->
        <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
</form>
</div>




















