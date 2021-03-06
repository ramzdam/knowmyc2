@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">Generate Reports</div>
            <div class="panel-body">
                <h1 class="text-center">My C2 Log General Report Utility</h1>
                <h4 class="text-center">Display Pharmacy Name Here</h4>
                <div class="text-center" style="margin-bottom: 20px;">Leave a field blank to generate all information on the report</div>
                <form class="form-horizontal well" action="/reports/generate" method="get">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Search RX</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Select a single or multiple items">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Search NDC</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Select a single or multiple items">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Beginning date</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Select a single or multiple items">
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">To</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Select a single or multiple items">
                        </div>
                    </div>
                    <div class="form-control-static text-center"><strong>What do you want in your report?</strong></div>
                    <div class="form-group" id="filter-container" style="background: #fff;">
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Date Logged
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Drug Name
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Pharmacy DEA #
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Date Dispensed
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Drug NDC
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Pharmacy NPI #
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Script #
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Drug Manufacturer
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Pharmacy NCPDP #
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Dispensed QTY
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Drug Schedule
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Pharmacists in Charge
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Returned to Stock
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Broken Pills
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Expired Pills
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Pharmacist
                                </label>
                                <select style="margin-left: 20px;">
                                    <option>Select Pharmacist</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Technician
                                </label>
                                <select style="margin-left: 20px;">
                                    <option>Select Technician</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center" style="margin-top: 40px;">
                        <button class="btn btn-lg btn-primary btn_subpage" data-url="/reports/generate" type="button">Preview It</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>