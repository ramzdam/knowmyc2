<div class="modal fade" id="addDrugModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">ADD A DRUG</h4>
            </div>
            <div class="modal-body">
                <!--                <form id="new_drug_frm" action="">-->
                {!! Form::open(['url' => 'inventory', 'id' => 'new_drug_frm']) !!}
                <div id="new_drug">
                    <div class="form-group">
                        <input type="text" class="form-control" id="ndc" name="ndc" value="{{ old('ndc') }}" placeholder="Enter the NDC">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter the drug name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="rx_no" name="rx_no" value="{{ old('rx_no') }}" placeholder="Enter the RX #">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" placeholder="Manufacturer">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prescription" name="prescription" value="{{ old('prescription') }}" placeholder="Prescription">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="script_no" name="script_no" value="{{ old('script_no') }}" placeholder="script_no">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label text-left" style="text-align: left;"> Beginning inventory </label>
                        <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="1000">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Date Dispensed </label>
                        <input type="date" class="form-control date" id="date_dispensed" name="date_dispensed" value="{{ old('date_dispensed') }}" placeholder="Date Dispensed">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Drug Schedule </label>
                        <input type="date" class="form-control date" id="drug_schedule" name="drug_schedule" value="{{ old('drug_schedule') }}" placeholder="Drug Schedule">
                    </div>
                </div>

                <div id="verify">
                    <h2>You are logging a new drug quantity</h2>
                    <div><strong>Drug NDC: </strong><span id="ndc_span">Display drug NDC HERE</span></div>
                    <div><strong>Drug Name: </strong><span id="name_span">Display drug name HERE</span></div>
                    <hr/>
                    <div><strong>Previous SOH: </strong><span id="soh_span">Display Previous SOH HERE</span></div>
                    <div><strong>New SOH: </strong><span id="new_soh_span">Display New SOH HERE</span></div>
                    <hr/>
                    <div><strong>Date Dispensed: </strong><span id="date_dispensed_span">March 28, 1983</span></div>
                    <div><strong>Date Written: </strong><span id="date_written_span">{{ date('Y-m-d H:i:s') }}</span></div>
                    <div><strong>Pharmacist: </strong><span id="pharmacists_span">{{ session('data.userinfo')->fname }}</span></div>
                    <!--                        <div><strong>Technician: </strong><span id="technician_span">Display selected Technician HERE</span></div>-->
                    <div><strong>Manufacturer: </strong><span id="manufacturer_span">Display Manufacturer HERE</span></div>
                    <div><strong>Prescription: </strong><span id="prescription_span">Display Prescrition HERE</span></div>
                    <div><strong>Script #: </strong><span id="script_no_span">Display Script No. HERE</span></div>
                    <div><strong>Dispensed QTY: </strong><span id="quantity_span">284 Quantity dispensed</span></div>
                    <div><strong>Drug Schedule: </strong><span id="drug_schedule_span">Display Drug Schedule</span></div>
                    <div><strong>Prescription & Display RX#: </strong><span id="rx_span">Here won't display if the log is for Broken Pill or RTS</span></div>
                </div>

                {!! Form::close() !!}
                <!--                </form>-->

            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-primary btn-lg btn-block" id="add_drug">ADD IT</button>
            </div>
        </div>
    </div>
</div>