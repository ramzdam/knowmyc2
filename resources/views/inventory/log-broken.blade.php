@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <div class="panel panel-info">
            <div class="panel-heading">LOG A BROKEN/EXPIRED DRUG</div>
            <div class="panel-body">
                <div class="alert alert-danger error_container" role="alert" style="display: none;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <span class="error_message">Enter a valid email address</span>
                </div>
                {!! Form::open(['url' => 'inventory/broken', 'id' => 'log_broken_drug_frm']) !!}
                    <div id="new_drug">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="ndc" name="ndc" value="{{ old('ndc') }}" placeholder="Scan or Type NDC">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"> Beginning inventory </label>
                            <input type="text" class="form-control input-lg" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Dispensed Quantity">
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
                            <select class="form-control input-lg" id="log_type" name="log_type">
                                <option value="">--- Select Broken / Expired ---</option>
                                <option value="{{ App\DRUG::BROKEN }}">Broken</option>
                                <option value="{{ App\DRUG::EXPIRED }}">Expired</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success btn-lg btn-block text-uppercase" id="bnt_verify"><i class="glyphicon glyphicon-floppy-disk"></i> Log It</button>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
<!--                </form>-->
</div>
@include('partials.modal', array('page' => 'log_broken', 'title' => 'You are logging a drug'));
<script>
    $(document).ready(function(){
        $("#chk_part2").click(function() {
            if ($(this).is(':checked')) {
                $("#rx_part2").fadeIn();
            } else {
                $("#rx_part2").fadeOut();
            }
        });
        $("#log_type").change(function(){
            $(this).find("option").eq(0).remove();

        });
        $('#bnt_verify').on('click', function (event) {
            var $data = $("#log_broken_drug_frm").serialize();
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

                    copyPopulatedFields();
                    $("#span_soh").html(soh);
                    $("#span_newsoh").html(response.negative_soh);
                    $("#verify").modal('show');
                }
            }).done(function() {
                $(".center-loading").hide();
            });
        });

        $("#logit").on('click', function() {
            logIt("#log_broken_drug_frm");
        });
    });

</script>