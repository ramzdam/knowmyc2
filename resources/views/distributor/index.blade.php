@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading heading-title">Wholesaler and Pharmacy Maintenance<span id="status_message"></span></div>
            <div class="panel-body">
                <h3 class="text-center">@if (Session::has('data.pharmacy')) {{ Session::get('data.pharmacy')->name }} @endif</h3>
                <div class="alert alert-danger error_container" role="alert" style="display: none;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <span class="error_message">Enter a valid email address</span>
                </div>
                {!! Form::open(['url' => 'inventory/search-script', 'id' => 'check_drug_frm']) !!}
<!--                <div id="check_drug" class="form-group text-center col-md-12" style="margin-top:30px;">-->
<!--                    <input type="text" class="input-lg col-md-6 col-md-offset-3 text-center" name="rx_no" id="rx_no" placeholder="Rx Number" />-->
<!--                </div>-->
                <div class="form-group text-center col-sm-12" style="margin-top:30px;">
                    <table class="table" style="font-size: 0.9em;">
                        <thead>
                            <th>Pharmacy Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Contact Number</th>
                            <th>Distributor Type</th>
                            <th>View</th>
                        </thead>
                        <tbody>
                        @foreach($distributors as $distributor)
                            <tr>
                                <td>{{ $distributor->name }}</td>
                                <td>{{ $distributor->address }}</td>
                                <td>{{ $distributor->city }}</td>
                                <td>{{ $distributor->state }}</td>
                                <td>{{ $distributor->contact }}</td>
                                <td>{{ $distributor->type }}</td>
                                <td><a href="#" class="btn btn-info view" data-url="distributor/{{ $distributor->id }}"  style="vertical-align: middle;"><i class="glyphicon glyphicon-search"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="form-group text-center col-sm-12" style="margin-top:30px;">
                    <a href="#" class="btn btn-success btn_subpage btn-lg" data-url="distributor/create"  style="vertical-align: middle;"><i class="glyphicon glyphicon-plus-sign"></i> ADD NEW </a>
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
<div class="modal fade" id="distributor_detail" tabindex="-1" role="dialog" aria-labelledby="detailsModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Wholesale and Pharmacy Maintenance</h4>
            </div>
            <div class="modal-body">
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function(){

        var extensions = {
            "sFilter": "dataTables_filter input-lg col-md-9",
            "sLength": "dataTables_length input-lg"
        }
        // Used when bJQueryUI is false
        $.extend($.fn.dataTableExt.oStdClasses, extensions);
        // Used when bJQueryUI is true
        $.extend($.fn.dataTableExt.oJUIClasses, extensions);

        $('.table').dataTable();

        $("#transaction_logs").on('click', function() {
            alert("here");
            return false;
        });
        $(".center-loading").hide();

        $(".view").on('click', function() {
            $.ajax({
                url: $(this).attr('data-url'),
                type: 'GET',
                dataType: 'HTML',
                beforeSend: function() {
                    $(".center-loading").fadeIn();
                },
                success: function(response) {

                    $(".modal-body").html(response);
                    $("#distributor_detail").modal('show');
                    $(".center-loading").hide();
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
                $("#distributor_detail").modal('hide');
            });
        });
    });


</script>