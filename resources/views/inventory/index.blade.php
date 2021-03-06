@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <form class="form-group form-inline well">
<!--        <input type="text" class="form-control col-sm-8" placeholder="Type drug name here" />-->
<!--        <a href="#" class="btn btn-default"  style="vertical-align: middle;" data-toggle="modal" data-target="#logVerificationModal"><i class="glyphicon glyphicon-search"></i> Search Drug </a>-->
        <a href="#" class="btn btn-success btn_subpage btn-lg" data-url="inventory/add"  style="vertical-align: middle;"><i class="glyphicon glyphicon-plus-sign"></i> ADD DRUG </a>
        </form>
        <div class="table-responsive">
            <table class="table table-striped list-table">
                <thead>
                <tr>
                    <th>Drug Name</th>
                    <th>Strength</th>
                    <th>Form</th>
                    <th>Manufacturer</th>
                    <th>NDC</th>
                    <th>SOH</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($drugs as $drug)
                <tr>
                    <td>{{ $drug->name }}</td>
                    <td>{{ $drug->strength }}</td>
                    <td>{{ $drug->form }}</td>
                    <td>{{ $drug->manufacturer }}</td>
                    <td>{{ $drug->ndc }}</td>
                    <td>{{ $drug->quantity }}</td>
                    <td><a href="#" class="btn btn-info edit btn_subpage" data-url="/inventory/{{ Crypt::encrypt($drug->id) }}"><i class="glyphicon glyphicon-search"></i> View </a> </td>
                </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $('.list-table').DataTable();
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
