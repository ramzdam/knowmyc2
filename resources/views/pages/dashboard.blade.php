@extends('master')
@section('content')
<div id="dashboard" class="col-md-12">
    <div class="panel panel-primary">
<!--        <div class="panel-heading">Dashboard</div>-->
        <div class="panel-body">
            <div style="margin-left: 15px;padding: 20px;border-radius:.5em;border: 1px solid #eee;background: #fff;">
                <h2 style="margin:0;text-align: center;" class="text-uppercase">Know My C2</h2>
                <div class="text-center">Controlled Substance Perpetual Inventory Management and Reporting System</div>
                <h3 class="text-center">@if (Session::has('data.pharmacy')) {{ Session::get('data.pharmacy')->name }} @endif</h3>
                <div>
                    <button id="btn_log_drug" class="btn btn-lg btn-warning btn-block margin-bottom-block btn_subpage" data-url="/inventory/log-drug"><i class="glyphicon glyphicon-log-in pull-left"></i> LOG A DRUG</button>
                    <button id="btn_log_inventory" class="btn btn-lg btn-primary btn-block margin-bottom-block btn_subpage" data-url="/inventory/create"><i class="glyphicon glyphicon-log-in pull-left"></i> LOG INVENTORY</button>
                    <button id="btn_log_broken" class="btn btn-lg btn-info btn-block margin-bottom-block btn_subpage" data-url="/inventory/broken"><i class="glyphicon glyphicon-log-in pull-left"></i> LOG A BROKEN / EXPIRED PILL</button>
                    <button id="btn_reports" class="btn btn-lg btn-success btn-block margin-bottom-block btn_subpage" data-url="/reports"><i class="glyphicon glyphicon-log-in pull-left"></i> REPORTS</button>
                    <div class="text-center row">
                        <div class="col-sm-4 bottom-button">
                            <button id="btn_links" class="btn btn-lg btn-default btn-block btn_subpage" data-url="distributor">Wholesaler / Pharmacy</button>
                        </div>
                        <div class="col-sm-4 bottom-button">
                            <button id="btn_account" class="btn btn-lg btn-default btn-block btn_subpage" data-url="inventory/logDrug">My Account</button>
                        </div>
                        <div class="col-sm-4 bottom-button">
                            <button id="btn_links" class="btn btn-lg btn-default btn-block btn_subpage" data-url="inventory/logDrug">Helpful Links</button>
                        </div>
                    </div>
                    <div class="text-center row" style="margin-top: 20px;">
                        <div class="col-sm-6 col-sm-offset-3">
                            <a href="/auth/logout" class="btn btn-lg btn-danger btn-block">Signout</a>
                        </div>
                    </div>
                </div>

<!--                <form>-->
<!--                    <h4 class="text-center jumbotron " style="margin:20px 0 60px 0;color: #666666;">@if (Session::has('data')) {!! Session('data.pharmacy')->name !!} @endif</h4>-->
<!--                    <div class="form-group form-group-lg">-->
<!--                        <input type="text" class="form-control" id="username" placeholder="Enter the drug NDC" />-->
<!--                        <button type="submit" class="btn btn-primary btn-block btn-lg" style="margin-top: 20px;">Add to log</button>-->
<!--                    </div>-->
<!--                </form>-->
            </div>
        </div>
        <div class="panel-footer">
            <div style="margin-bottom: 20px;">myc2log.com information</div>
            <address>
                @if (Session::has('data')) {!! Session('data.pharmacy')->contact !!} @endif <br/>
                Address: @if (Session::has('data')) {!! Session('data.pharmacy')->address !!} @else No Address @endif<br/>
                Contact Person: @if (Session::has('data')) {!! Session('data.pharmacy')->contact_person !!} @else No Contact Person @endif<br/>
            </address>

        </div>
    </div>
</div>
@stop