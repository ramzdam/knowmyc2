@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading heading-title">LOG A DRUG</div>
            <div class="panel-body">
                <h3 class="text-center">@if (Session::has('data.pharmacy')) {{ Session::get('data.pharmacy')->name }} @endif</h3>
                <div class="alert alert-danger error_container" role="alert" style="display: none;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <span class="error_message">Enter a valid email address</span>
                </div>
                {!! Form::open(['url' => 'inventory/dispense', 'id' => 'log_drug_frm']) !!}
                    <div id="new_drug">
                        <div class="form-group">
<!--                            <input type="text" class="form-control input-lg" id="ndc" name="ndc" value="{{ old('ndc') }}" placeholder="Scan or Type NDC">-->
                            <select class="select2 form-control" id="ndc" name="ndc" placeholder="-- No drugs registered yet --">
                                @forelse($drugs as $drug)
                                <option value="{{ $drug->ndc }}">{{ $drug->ndc }} [{{ $drug->name }} {{ $drug->strength }}]</option>
                                @empty
                                <option>-- No drugs registered yet --</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"> Quantity to log </label>
                            <input type="text" class="form-control input-lg" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Dispensed Quantity">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="rx_no" name="rx_no" value="{{ old('rx_no') }}" placeholder="Scan or Type RX #">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Date Dispensed </label>
                            <input type='text' class="form-control input-lg datetime" name="date_dispensed" id="date_dispensed" />

<!--                            <input type="date" class="form-control date input-lg" id="date_dispensed" name="date_dispensed" value="{{ old('date_dispensed') }}" placeholder="Date Dispensed">-->
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Drug Schedule </label>
                            <input type='text' class="form-control input-lg datetime" name="date_written" id="date_written" />

<!--                            <input type="date" class="form-control date input-lg" id="date_written" name="date_written" value="{{ old('date_written') }}" placeholder="Drug Schedule">-->
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
                        <button type="button" class="btn btn-success btn-lg btn-block text-uppercase" id="bnt_verify"><i class="glyphicon glyphicon-floppy-disk"></i> Log It</button>
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
@include('partials.modal', array('page' => 'log_drug', 'title' => 'You are logging a drug'));
<script>
    $(document).ready(function(){
        $('select').select2({
            placeholder: $(this).attr('placeholder'),
            tags: true
        });
        $('.datetime').datetimepicker({
            defaultDate: new Date()
        });
        $("#chk_part2").click(function() {
            if ($(this).is(':checked')) {
                $("#rx_part2").fadeIn();
            } else {
                $("#rx_part2").fadeOut();
            }
        });

        $('#new_drug_confirm').on('hidden.bs.modal', function (e) {
            var url = $("#confirm").attr('data-url');
            load_subpage(url);
        });

        $('#bnt_verify').on('click', function (event) {
            var $data = $("#log_drug_frm").serialize();
            $.ajax({
                url: 'inventory/soh',
                type: 'POST',
                dataType: 'json',
                data: $data,
                beforeSend: function() {
                    $(".center-loading").fadeIn();
                },
                success: function(response) {
                    if (response.success == false) {
                        $("#new_drug_confirm").modal('show');
                        return;
                    }

                    var soh = response.soh || 0;
                    copyPopulatedFields();
                    $("#span_soh").html(soh);
                    $("#span_name").html(response.name);
                    $("#span_newsoh").html(response.negative_soh);
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
            logIt("#log_drug_frm");
        });
    });

</script>