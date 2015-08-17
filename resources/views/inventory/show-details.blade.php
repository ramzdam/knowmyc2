@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <form class="form-group form-inline well">
<!--        <input type="text" class="form-control col-sm-8" placeholder="Type drug name here" />-->
<!--        <a href="#" class="btn btn-default"  style="vertical-align: middle;" data-toggle="modal" data-target="#logVerificationModal"><i class="glyphicon glyphicon-search"></i> Search Drug </a>-->
            <table class="table table-striped list-table">
                <thead>
                <tr>
                    <th>Drug Name</th>
                    <th>Strength</th>
                    <th>Form</th>
                    <th>Manufacturer</th>
                    <th>NDC</th>
                    <th>SOH</th>
                </tr>
                </thead>
                <tbody>
                @if ($drug)
                <tr>
                    <td>{{ $drug->name }}</td>
                    <td>{{ $drug->strength }}</td>
                    <td>{{ $drug->form }}</td>
                    <td>{{ $drug->manufacturer }}</td>
                    <td>{{ $drug->ndc }}</td>
                    <td>{{ $drug->quantity }}</td>
                </tr>

                @endif

                </tbody>
            </table>
        </form>
        <div class="table-responsive">
            <table id="logtable" class="table table-striped list-table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>QTY</th>
                    <th>RX#</th>
                    <th>Supplier</th>
                    <th>Invoice #</th>
                    <th>Supplier DEA</th>
                    <th>RPH</th>
                    <th>Tech</th>
                    <th>DEA Order #</th>
                    <th>SOH</th>
                    <th>RPH</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($drug_logs as $log)
                <tr>
                    <td>{{ $log->date_in }}</td>
                    <td>{{ $log->quantity }}</td>
                    <td>{{ $log->rx_no }}</td>
                    <td>{{ $log->manufacturer }}</td>
                    <td>{{ $log->invoice_no }}</td>
                    <td>{{ $log->dea_no }}</td>
                    <td></td>
                    <td>{{ $log->pharmacist->fname }}</td>
                    <td>{{ $log->dea_no }}</td>
                    <td>{{ $log->current_soh }}</td>
                    <td></td>
                </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $('#logtable').DataTable();
    $('#addDrugModal').on('show.bs.modal', function (event) {
        $("#verify").hide();
    });
    $('#addDrugModal').on('hidden.bs.modal', function () {
        clearData();
    })
    $("#add_drug").click(function() {
        copyToVerify();

        if ($(this).hasClass('submit')) {
            submit($("#new_drug_frm"));
//            $("#new_drug_frm").submit();
            $(this).removeClass('submit');
        } else {
            $(this).addClass('submit');
        }
        return false;
    });
    $(".edit").on("click", function(event) {

    })


    function submit($form) {

        $.ajax({
            url: $form.attr("action"),
            dataType: 'json',
            type: 'POST',
            data: $form.serialize(),
            beforeSend: function() {
                $(".center-loading").fadeIn();
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    window.location.href = '/inventory';
                }
            }
        }).done(function() {
            $(".center-loading").hide();
        }).error(function(data){
            var errors = data.responseJSON;
            div = "<div id='error_message'>";
            $.each(errors, function( index, value ) {

                div += "<div  class='error has-error'>" + value + "</div>";
            });
            div += "</div>";

           $("#new_drug_frm").prepend(div);
            $(this).removeClass('submit');
        });
    }

    function clearData() {
        $("#new_drug").show();
        $('#verify').hide();
        $('#error_message').remove();

        $("#ndc").val('');
        $("#name").val('');
        $("#soh").val('');
        $("#new_soh").val('');
        $("#date_dispensed").val('');
//        $("#pharmacists_span").html($("#ndc").val());
        $("#quantity").val('');
        $("#drug_schedule").val('');
        $("#rx_no").val('');
        $("#manufacturer").val('');
        $("#prescription").val('');
        $("#script_no").val('');
    }

    function copyToVerify() {
        $("#new_drug").hide();
        $('#verify').show();

        $("#ndc_span").html($("#ndc").val());
        $("#name_span").html($("#name").val());
        $("#soh_span").html("");
        $("#new_soh_span").html("");
        $("#date_dispensed_span").html($("#date_dispensed").val());
//        $("#pharmacists_span").html($("#ndc").val());
        $("#quantity_span").html($("#quantity").val());
        $("#drug_schedule_span").html($("#drug_schedule").val());
        $("#rx_span").html($("#rx_no").val());
        $("#manufacturer_span").html($("#manufacturer").val());
        $("#prescription_span").html($("#prescription").val());
        $("#script_no_span").html($("#script_no").val());
    }
</script>
