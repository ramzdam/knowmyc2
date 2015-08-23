@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading heading-title">Drug Inventory - Addition <span id="status_message"></span></div>
            <div class="panel-body">
                <h3 class="text-center">@if (Session::has('data.pharmacy')) {{ Session::get('data.pharmacy')->name }} @endif</h3>
                <div class="alert alert-danger error_container" role="alert" style="display: none;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <span class="error_message">Enter a valid email address</span>
                </div>
                {!! Form::open(['url' => 'inventory/search-script', 'id' => 'check_drug_frm']) !!}
                <div id="check_drug" class="form-group text-center col-md-12" style="margin-top:30px;">
                    <input type="text" class="input-lg col-md-6 col-md-offset-3 text-center" name="rx_no" id="rx_no" placeholder="Rx Number" />
                </div>
                <div class="form-group text-center col-sm-12" style="margin-top:30px;">
                    <button type="button" class="input-group btn btn-success btn-lg text-center text-uppercase col-sm-4 col-sm-offset-4" id="bnt_checkit"> CHECK IT</button>
                    <div class="text-center" style="font-size: 1.5em;margin-top: 20px;">
                        <a href="/" class="btn btn-default home_button">KnowMyC2 Home</a>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!--                </form>-->
</div>
@include('partials.modal', array('page' => 'log_inventory', 'title' => 'You are adding an inventory item'));
<script>
    $(document).ready(function(){
        $('select').select2();

        $('#date_dispensed').datetimepicker({
            defaultDate: new Date()
        });

        $('#bnt_checkit').on('click', function (event) {
            searchRx();
        });


        $("#rx_no").keypress(function (e) {
            if (e.keyCode == 13) {
                searchRx();
            }

        });

    });

    function searchRx() {

        var $data = $("#check_drug_frm").serialize();
        if ($("#rx_no").val() == '') {
            showMessage("RX Field is empty");
            return false;
        }
        $.ajax({
            url: 'inventory/search-script/' + $("#rx_no").val(),
            type: 'GET',
            dataType: 'json',
            data: $data,
            beforeSend: function() {

                $(".center-loading").fadeIn();
            },
            success: function(response) {
                if (response.success == false) {
                    showMessage(response.message, response.success);
                    return;
                }
                $("#content").html(response.message);
                $("#verify").modal('show');
            }
        }).done(function() {
            $(".center-loading").hide();
            return false;
        }).error(function(error_reply) {

            var errors = error_reply.responseJSON;

            var ul = '<ul>';

            $.each(errors, function(index, item) {
                ul += '<li>' + item + '</li>';
            });

            ul += '</ul>';

            showMessage(ul);
            $(".center-loading").hide();
            $("#verify").modal('hide');
            return false;
        });


        $("#check_drug_frm").submit(function(e){
            e.preventDefault();
        });



    }


</script>