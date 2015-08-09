@extends('master')
@include('partials.modal')
@section('content')
<form class="form-group form-inline well">
    <input type="text" class="form-control col-sm-8" placeholder="Type drug name here" />
    <a href="#" class="btn btn-default"  style="vertical-align: middle;" data-toggle="modal" data-target="#logVerificationModal"><i class="glyphicon glyphicon-search"></i> Search Drug </a>
    <a href="#" class="btn btn-success"  style="vertical-align: middle;" data-toggle="modal" data-target="#addDrugModal">Add</a>
    <a href="#" class="btn btn-info"  style="vertical-align: middle;" data-toggle="modal" data-target="#expiredModal">Edit</a>
    <a href="#" class="btn btn-default"  style="vertical-align: middle;" data-toggle="modal" data-target="#logVerificationModal">Check</a>
    <a href="#" class="btn btn-default"  style="vertical-align: middle;" data-toggle="modal" data-target="#checkdrugModal">Reports</a>
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


</script>
@stop