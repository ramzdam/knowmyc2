@extends('master')
@include('partials.sidebar')
@section('content')
<div id="dashboard" class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
            <div style="margin-left: 15px;padding: 20px;border-radius:.5em;border: 1px solid #eee;background: #fff;">
            <h2 style="margin:0;text-align: center;" class="text-uppercase">My C2 Log</h2>
            <div class="text-center">Controlled Substance Perpetual Inventory Management and Reporting System</div>
                <form>
                    <h4 class="text-center jumbotron " style="margin:20px 0 60px 0;color: #666666;">Display Pharmacy Name Here</h4>
                    <div class="form-group form-group-lg">
                        <input type="text" class="form-control" id="username" placeholder="Enter the drug NDC" />
                        <button type="submit" class="btn btn-primary btn-block btn-lg" style="margin-top: 20px;">Add to log</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel-footer">
            <div style="margin-bottom: 20px;">myc2log.com information</div>
            <address>
                Contact information <br/>
                Ipsum Lorem: 092323 ipsum lorem ipsum<br/>
                Ross Snyder: 092323 ipsum lorem ipsum<br/>
            </address>

        </div>
    </div>
</div>

@stop