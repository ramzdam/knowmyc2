@include('partials.sidebar')
<div class="container-fluid">
    <div id="dashboard" class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading heading-title">Wholesaler and Pharmacy Addition <span id="status_message"></span></div>
            <div class="panel-body">
                <h3 class="text-center">@if (Session::has('data.pharmacy')) {{ Session::get('data.pharmacy')->name }} @endif</h3>
                <div class="alert alert-danger error_container" role="alert" style="display: none;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    <span class="error_message">Enter a valid email address</span>
                </div>
                @if (isset($details))
                {!! Form::model($details,['action'=>['DistributorController@update', $details->id], 'id' => 'new_distributor_frm', 'method' =>'PUT']) !!}
                @else
                {!! Form::open(['url' => 'distributor', 'id' => 'new_distributor_frm']) !!}
                @endif

                <div id="new_distributor">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Wholesaler/Pharmacy</label>
                            <select class="form-control input-lg" id="type" name="type">
                                @forelse($distributors as $index => $distributor)
                                <option @if(isset($details) && $distributor == $details->type) selected='selected' @endif value="{{ $index }}">{{ $distributor }}</option>
                                @empty
                                <option>-- No Registered Distributor --</option>
                                @endforelse
                            </select>

                        </div>
                        <div class="col-sm-6">
                            <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Date Added </label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" id="date_added" name="date_added" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

                        </div>
                        <br style="clear:both;"/>
                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control input-lg', 'placeholder' => 'Name']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::text('contact', null, ['id' => 'phone_no', 'class' => 'form-control input-lg', 'placeholder' => 'Phone #']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control input-lg', 'placeholder' => 'Address']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            {!! Form::text('city', null, ['id' => 'city', 'class' => 'form-control input-lg', 'placeholder' => 'City']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::text('state', null, ['id' => 'state', 'class' => 'form-control input-lg', 'placeholder' => 'State']) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('zipcode', null, ['id' => 'zipcode', 'class' => 'form-control input-lg', 'placeholder' => 'Zipcode']) !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::text('dea', null, ['id' => 'dea', 'class' => 'form-control input-lg', 'placeholder' => 'DEA #']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::text('npi', null, ['id' => 'npi', 'class' => 'form-control input-lg', 'placeholder' => 'NPI #']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::text('rep', null, ['id' => 'rep', 'class' => 'form-control input-lg', 'placeholder' => 'Rep/PIC/Contact Info']) !!}
                    </div>
                    <div class="form-group">

                        {!! Form::text('note', null, ['id' => 'note', 'class' => 'form-control input-lg', 'placeholder' => 'Pharmacy Note']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="#" class="btn btn-info btn_subpage btn-lg btn-block" data-url="distributor"  style="vertical-align: middle;"><i class="glyphicon glyphicon-backward"></i> Return to Wholesaler/Pharmacy Info </a>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-success btn-lg btn-block text-uppercase" id="btn_save"><i class="glyphicon glyphicon-floppy-disk"></i> SAVE IT!!</button>
                    </div>
                </div>
                <div class="form-group">
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
@include('partials.modal', array('page' => 'log_inventory', 'title' => 'You are adding an inventory item'));
<script>
    $(document).ready(function(){
        $('select').select2();
        var new_data = new Date();

        @if (isset($details))
            new_data = "{{ date($details->created_at) }}"
        @endif

        $('#date_added').datetimepicker({
            defaultDate: new_data

        });

        $("#btn_save").on('click', function() {

            logIt("#new_distributor_frm")

        });
        $(".center-loading").hide();
    });


</script>