<script type="text/javascript">
function opLoading(stt, message='', dly='') {
    if (stt === 'open') {
        $('#loading').show();
        $('#loading').find('#message').html(message);
        } else {
            $('#loading').hide();
        }
    }
    $(document).ready(function() {
        $('#progressbar').progressbar({
        value: false,
        });
    });
</script>
<div class="loading" id="loading">
    <div class="place">
        <div id="message">
            The message will shown in here
        </div>
        <div id="block">
            <div id="progressbar"></div>
        </div>
    </div>
</div>
