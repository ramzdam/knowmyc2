<div class="modal fade" id="verify" tabindex="-1" role="dialog" aria-labelledby="verifyModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Check a Drug or Script @if(isset($page)) {{ $page }} @endif</h4>
            </div>
            <div class="modal-body">
                <h2>@if(isset($title)) {{ $title }} @endif</h2>
                <div><strong>Drug NDC: </strong><span id="span_ndc">Display drug NDC HERE</span></div>
                <div><strong>Drug Name: </strong><span id="span_name">Display drug name HERE</span></div>
                <hr/>
                <div><strong>Previous SOH: </strong><span id="span_soh">Display Previous SOH HERE</span></div>
                <div><strong>New SOH: </strong><span id="span_newsoh">Display New SOH HERE</span></div>
                <hr/>
                <div><strong>Date Dispensed: </strong><span id="span_dispensed">March 28, 1983</span></div>
                <div><strong>Date Written: </strong><span id="span_written">March 28, 1983</span></div>
                <div><strong>Pharmacist: </strong><span id="span_pharmacist">Display selected Pharmacists HERE</span></div>
                <div><strong>Technician: </strong><span id="span_technician">Display selected Technician HERE</span></div>
                <div><strong>Dispensed QTY: </strong><span id="span_qty">284 Quantity dispensed</span></div>
                <div><strong>Drug Schedule: </strong><span id="span_schedule">Display Drug Schedule</span></div>
                @if ($page != 'log_broken')
                <div><strong>Prescription & Display RX#: </strong><span id="span_rx">Here won't display if the log is for Broken Pill or RTS</span></div>
                @endif
            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-primary btn-lg btn-block" id="logit">LOG IT</button>
            </div>
        </div>
    </div>
</div>
<script>
    function copyPopulatedFields() {

        $("#span_ndc").html($("#ndc").val());
        $("#span_name").html($("#name").val());
        $("#span_soh").html('');
        $("#span_newsoh").html('');
        $("#span_dispensed").html($("#date_dispensed").val());
        $("#span_written").html($("#drug_written").val());
        $("#span_pharmacist").html($("#pharmacist option:selected").text());
        $("#span_technician").html($("#technician option:selected").text());
        $("#span_qty").html($("#quantity").val());
        $("#span_schedule").html('');
        $("#span_rx").html($("#rx_no").val());

    }
</script>
