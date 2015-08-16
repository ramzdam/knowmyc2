@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">LOG INVENTORY ITEM <span id="status_message"></span></div>
            <div class="panel-body">
                {!! Form::open(['url' => 'inventory', 'id' => 'new_drug_frm']) !!}
                    <div id="new_drug">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="ndc" name="ndc" value="{{ old('ndc') }}" placeholder="Scan or type NDC">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="invoice" name="invoice" value="{{ old('invoice') }}" placeholder="Enter Invoice Number">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"> Threshold alert </label>
                            <input type="text" class="form-control input-lg" id="threshold" name="threshold" value="{{ old('threshold') }}" placeholder="Minimum amount to alert">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="QTY Added or Return">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="dea" name="dea" value="{{ old('dea') }}" placeholder="DEA order #">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Date Dispensed </label>
                            <input type="date" class="form-control date input-lg" id="date_dispensed" name="date_dispensed" value="{{ old('date_dispensed') }}" placeholder="Date Dispensed">
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
                        <div class="form-group">
                            <!--                            <label for="inputEmail3" class="checkbox"><input type="checkbox" class="input-lg" id="rx_part2" name="rx_part2" value="{{ old('rx_part2') }}"> Drug Schedule </label>-->
                            <div class="checkbox">
                                <label>
                                    <input type="radio" value="from" name="to_from" class="to_from" checked> From
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="radio" value="to" name="to_from" class="to_from"> To
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="other" name="other" id="other"> Other Pharmacy
                                </label>
                            </div>
                            <div class="form-group" id="pharmacy_list">
                                <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Select Pharmacy</label>
                                <select class="form-control input-lg" id="pharmacy" name="pharmacy">
                                    @if (isset($pharmacies))
                                        @forelse($pharmacies as $pharmacy)
                                        <option value="{{ $pharmacy->id }}">{{ $pharmacy->name }}</option>
                                        @empty
                                        <option>-- No Registered Pharmacy --</option>
                                        @endforelse
                                    @else
                                    <option>-- No Registered Pharmacy --</option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group" id="other_pharma_div" style="display: none;">
                                <input type="date" class="form-control date input-lg" id="other_pharmacy" name="other_pharmacy" value="{{ old('other_pharmacy') }}" placeholder="Other Pharmacy Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success btn-lg btn-block text-uppercase" data-toggle="modal" data-target="#verify"><i class="glyphicon glyphicon-floppy-disk"></i> Log It</button>
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
        $("#other").click(function() {
            if ($(this).is(":checked")) {
                $("#pharmacy_list").hide();
                $("#other_pharma_div").fadeIn();
            } else {
                $("#other_pharma_div").hide().val('');
                $("#pharmacy_list").fadeIn();
            }
//            console.log($("input:radio[name=to_from]:checked").val());
        });

        $('#verify').on('show.bs.modal', function (event) {
            copyPopulatedFields();
        });


        $("#logit").on('click', function() {
            var $data = $("#new_drug_frm").serialize();

            $.ajax({
                url: $("#new_drug_frm").attr('action'),
                type: 'POST',
                dataType: 'json',
                data: $data,
                success: function(response) {

                    $message = $("#status_message").html(response.message)
                    if (response.success) {
                        $message.removeClass('error').addClass("success").fadeIn();
                    } else {
                        $message.removeClass('success').addClass("error").fadeIn();
                    }
                }
            }).error(function(error_reply) {
                var errors = error_reply.responseJSON;
                console.log(errors);
            });
        });
    });

</script>