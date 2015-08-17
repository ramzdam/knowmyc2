@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">Drug Inventory - Addition <span id="status_message"></span></div>
            <div class="panel-body">
                <div class="alert alert-danger error_container" role="alert" style="display: none;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <span class="error_message">Enter a valid email address</span>
                </div>
                {!! Form::open(['url' => 'inventory/add-drug', 'id' => 'new_drug_frm']) !!}
                <div id="new_drug">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="name" name="name" value="{{ old('name') }}" placeholder="Drug Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="strength" name="strength" value="{{ old('strength') }}" placeholder="Strength">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="form" name="form" value="{{ old('form') }}" placeholder="Form">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" placeholder="Manufacturer">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="ndc" name="ndc" value="{{ old('ndc') }}" placeholder="Scan or type NDC">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label text-left" style="text-align: left;"> Threshold alert </label>
                        <input type="text" class="form-control input-lg" id="threshold" name="threshold" value="{{ old('threshold') }}" placeholder="Minimum amount to alert">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="QTY Added or Return">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Date Dispensed </label>
<!--                        <input type='text' class="form-control input-lg datetime" name="date_dispensed" id="date_dispensed" />-->
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" id="date_dispensed" name="date_dispensed" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Select Pharmacist</label>
                        <select class="form-control input-lg" id="pharmacist" name="pharmacist">
                            @forelse($pharmacists as $pharmacist)
                            <option value="{{ $pharmacist->id }}">{{ $pharmacist->lname . ', ' . $pharmacist->fname }}</option>
                            @empty
                            <option>-- No Registered Pharmacist --</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Select Technician </label>
                        <select class="form-control input-lg" id="technician" name="technician">
                            @forelse($pharmacists as $pharmacist)
                            <option value="{{ $pharmacist->id }}">{{ $pharmacist->lname . ', ' . $pharmacist->fname }}</option>
                            @empty
                            <option>-- No Registered Pharmacist --</option>
                            @endforelse
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-success btn-lg btn-block text-uppercase" id="bnt_verify"><i class="glyphicon glyphicon-floppy-disk"></i> Add Drug</button>
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
        $('#date_dispensed').datetimepicker();

        $('#bnt_verify').on('click', function (event) {
            var $data = $("#new_drug_frm").serialize();
            $.ajax({
                url: 'inventory/soh',
                type: 'POST',
                dataType: 'json',
                data: $data,
                beforeSend: function() {
                    $(".center-loading").fadeIn();
                },
                success: function(response) {
                    var soh = response.soh || 0;
                    var radio_selected = $("input:radio[name=to_from]:checked").val();
                    var next_soh = response.positive_soh;

                    copyPopulatedFields();
                    $("#span_soh").html(soh);
                    if (radio_selected == "to") {
                        next_soh = response.negative_soh;
                    }
                    $("#span_newsoh").html(next_soh);
                    $("#verify").modal('show');
                }
            }).done(function() {
                $(".center-loading").hide();
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
            });;
        });


        $("#logit").on('click', function() {
            logIt("#new_drug_frm")
        });
    });


</script>