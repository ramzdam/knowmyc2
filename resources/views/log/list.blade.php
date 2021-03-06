@extends('master')
@include('partials.sidebar')
@include('partials.modal')
@section('content')
<div id="dashboard" class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">Generate Reports</div>
        <div class="panel-body">
            <h1 class="text-center">My C2 Log General Report Utility</h1>
            <h4 class="text-center">Display Pharmacy Name Here</h4>
            <form class="form-group form-inline well">
                <a href="#" class="btn btn-success"  style="vertical-align: middle;" data-toggle="modal" data-target="#exampleModal">Log a Drug</a>
                <a href="#" class="btn btn-info"  style="vertical-align: middle;" data-toggle="modal" data-target="#expiredModal">Log a broken or expired pills</a>
                <input type="text" class="form-control" placeholder="Type drug name here" />
                <a href="#" class="btn btn-default"  style="vertical-align: middle;" data-toggle="modal" data-target="#logVerificationModal">Check a Drug</a>
                <a href="#" class="btn btn-default"  style="vertical-align: middle;" data-toggle="modal" data-target="#checkdrugModal">Check a Script</a>

            </form>
            <div class="table-responsive">
                <table class="table table-striped list-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date Logged</th>
                        <th>Quantity</th>
                        <th>NDC #</th>
                        <th>Actual #</th>
                        <th>Date Expire</th>
                        <th>Assign Pharmacist</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    <tr>
                        <td>Eat dirtd</td>
                        <td>March 7, 2015</td>
                        <td>5</td>
                        <td>74DRFG</td>
                        <td>5677899996</td>
                        <td>January 7, 2020</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    </tbody>
                </table>
            </div>

<!--                <div class="row">-->
<!--                    <div class="col-md-6" style="display: inline-block;">-->
<!--                        <a href="#" class="btn btn-success btn-block btn-lg"  style="height: 50px;vertical-align: middle;display: table-cell;width: 10%;font-size: 2em;">Log a Drug</a>-->
<!--                    </div>-->
<!--                    <div class="col-md-6">-->
<!--                        <a href="#" class="btn btn-info btn-block btn-lg"  style="height: 50px;vertical-align: middle;display: table-cell;width: 10%;font-size: 2em;">Log a broken or expired pill</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row" style="margin-top: 20px;">-->
<!--                    <div class="col-md-4">-->
<!--                        <a href="#" class="btn btn-default btn-block btn-lg"  style="height: 50px;vertical-align: middle;display: table-cell;width: 10%;">Log a broken or expired pill</a>-->
<!--                    </div>-->
<!--                    <div class="col-md-4">-->
<!--                        <a href="#" class="btn btn-default btn-block btn-lg"  style="height: 50px;vertical-align: middle;display: table-cell;width: 10%;">Log a broken or expired pill</a>-->
<!--                    </div>-->
<!--                    <div class="col-md-4">-->
<!--                        <a href="#" class="btn btn-default btn-block btn-lg"  style="height: 50px;vertical-align: middle;display: table-cell;width: 10%;">Log a broken or expired pill</a>-->
<!--                    </div>-->
<!--                </div>-->


<!--            </div>-->
        </div>
    </div>
</div>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
//        var button = $(event.relatedTarget) // Button that triggered the modal
//        var recipient = button.d  ata('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//        var modal = $(this);
//
//        modal.find('.modal-title').text('New message to ' + recipient)
//        modal.find('.modal-body input').val(recipient)
    });

    $(".date").datepicker();
</script>
@stop