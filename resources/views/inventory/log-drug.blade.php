@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <div class="panel panel-warning">
            <div class="panel-heading">LOG A DRUG</div>
            <div class="panel-body">
                {!! Form::open(['url' => 'inventory/dispense', 'id' => 'log_drug_frm']) !!}
                    <div id="new_drug">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="ndc" name="ndc" value="{{ old('ndc') }}" placeholder="Scan or Type NDC">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"> Beginning inventory </label>
                            <input type="text" class="form-control input-lg" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Dispensed Quantity">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="rx_no" name="rx_no" value="{{ old('rx_no') }}" placeholder="Scan or Type RX #">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Date Dispensed </label>
                            <input type="date" class="form-control date input-lg" id="date_dispensed" name="date_dispensed" value="{{ old('date_dispensed') }}" placeholder="Date Dispensed">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Drug Schedule </label>
                            <input type="date" class="form-control date input-lg" id="date_written" name="date_written" value="{{ old('date_written') }}" placeholder="Drug Schedule">
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
                                    <input type="checkbox" name="chk_part2" id="chk_part2" class="chk_part2"> RX Dispensing Part 2
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="chk_return" id="chk_return"> Return to Stock
                                </label>
                            </div>
                        </div>
                        <div id="rx_part2" style="display: none;">
                            <hr/>
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" id="ndc2" name="ndc2" value="{{ old('ndc2') }}" placeholder="Enter the NDC">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="control-label text-left" style="text-align: left;"> Beginning inventory </label>
                                <input type="text" class="form-control input-lg" id="quantity2" name="quantity2" value="{{ old('quantity2') }}" placeholder="1000">
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
@include('partials.modal', array('page' => 'log_drug', 'title' => 'You are logging a drug'));
<script>
    $(document).ready(function(){
        $("#chk_part2").click(function() {
            if ($(this).is(':checked')) {
                $("#rx_part2").fadeIn();
            } else {
                $("#rx_part2").fadeOut();
            }
        });

        $('#verify').on('show.bs.modal', function (event) {
            copyPopulatedFields();
        });

        $("#logit").on('click', function() {
            var $data = $("#log_drug_frm").serialize();

            $.ajax({
                url: $("#log_drug_frm").attr('action'),
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