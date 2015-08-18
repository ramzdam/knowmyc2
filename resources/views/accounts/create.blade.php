@extends('master')

@section('content')
<!--<form class="container">-->
{!! Form::open(['url' => 'accounts', 'class' => 'container']) !!}
    <h1 class="text-uppercase text-center"><strong>Know My C2 Account Setup</strong></h1>

    <div class="panel panel-info">
        <div class="panel-heading"> Login information</div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-md-6 @if ($errors->has('username')) has-error @endif">
                    <label for="username"><i class="glyphicon glyphicon-user"></i> Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ Input::old('username') }}" placeholder="Enter your desired username" />
                    @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
                </div>
                <div class="col-md-6 @if ($errors->has('password')) has-error @endif">
                    <label for="password"><i class="glyphicon glyphicon-user"></i> Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ Input::old('password') }}" placeholder="" />
                    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                </div>

            </div>
            <div class="form-group">

            </div>
        </div>
    </div>


    <div class="panel panel-primary">
        <div class="panel-heading">Pharmacy Physical/Shipping Address(all fields are required)</div>
        <div class="panel-body">
            <div class="form-group @if ($errors->has('name')) has-error @endif">
                <label for="name"><i class="glyphicon glyphicon-user"></i> Pharmacy Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Input::old('name') }}" placeholder="Enter Pharmacy Name Here" />
                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>
            <div class="form-group @if ($errors->has('address')) has-error @endif">
                <label for="address"><i class="glyphicon glyphicon-user"></i> Company Street Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ Input::old('address') }}" placeholder="Enter Pharmacy Street Address Here" />
                @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
            </div>
            <div class="form-group row">
                <div class="col-md-4 @if ($errors->has('city')) has-error @endif">
                    <label for="city"><i class="glyphicon glyphicon-user"></i> City</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ Input::old('city') }}" placeholder="Enter Pharmacy City Here" />
                    @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                </div>
                <div class="col-md-4 @if ($errors->has('state')) has-error @endif">
                    <label for="state"><i class="glyphicon glyphicon-user"></i> State</label>
                    <input type="text" class="form-control" id="state" name="state" value="{{ Input::old('state') }}" placeholder="Enter Pharmacy State Here" />
                    @if ($errors->has('state')) <p class="help-block">{{ $errors->first('state') }}</p> @endif
                </div>
                <div class="col-md-4 @if ($errors->has('zipcode')) has-error @endif" >
                    <label for="zipcode"><i class="glyphicon glyphicon-user"></i> Zip Code</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ Input::old('zipcode') }}" placeholder="Enter Pharmacy Zip Code" />
                    @if ($errors->has('zipcode')) <p class="help-block">{{ $errors->first('zipcode') }}</p> @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 @if ($errors->has('nabp')) has-error @endif">
                    <label for="nabp"><i class="glyphicon glyphicon-user"></i> NABP/NCPDP #</label>
                    <input type="text" class="form-control" id="nabp" name="nabp" value="{{ Input::old('nabp') }}" placeholder="Enter Pharmacy Name Here" />
                    @if ($errors->has('nabp')) <p class="help-block">{{ $errors->first('nabp') }}</p> @endif
                </div>
                <div class="col-md-4 @if ($errors->has('npi')) has-error @endif">
                    <label for="npi"><i class="glyphicon glyphicon-user"></i> NPI #</label>
                    <input type="text" class="form-control" id="npi" name="npi" value="{{ Input::old('npi') }}" placeholder="Enter Pharmacy Name Here" />
                    @if ($errors->has('npi')) <p class="help-block">{{ $errors->first('npi') }}</p> @endif
                </div>
                <div class="col-md-4 @if ($errors->has('dea')) has-error @endif" >
                    <label for="dea"><i class="glyphicon glyphicon-user"></i> DEA #</label>
                    <input type="text" class="form-control" id="dea" name="dea" value="{{ Input::old('dea') }}" placeholder="Enter Pharmacy Name Here" />
                    @if ($errors->has('dea')) <p class="help-block">{{ $errors->first('dea') }}</p> @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 @if ($errors->has('pic')) has-error @endif" >
                    <label for="pic"><i class="glyphicon glyphicon-user"></i> PIC - Pharmacist In Charge</label>
                    <input type="text" class="form-control" id="pic" name="pic" value="{{ Input::old('pic') }}" placeholder="Enter Pharmacist in Charge" />
                    @if ($errors->has('pic')) <p class="help-block">{{ $errors->first('pic') }}</p> @endif
                </div>
                <div class="col-md-4 @if ($errors->has('contact')) has-error @endif" >
                    <label for="contact"><i class="glyphicon glyphicon-user"></i> Company Contact #</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{ Input::old('contact') }}" placeholder="Contact" />
                    @if ($errors->has('contact')) <p class="help-block">{{ $errors->first('contact') }}</p> @endif
                </div>
                <div class="col-md-4 @if ($errors->has('contact_person')) has-error @endif" >
                    <label for="contact_person"><i class="glyphicon glyphicon-user"></i> Contact Person</label>
                    <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ Input::old('contact_person') }}" placeholder="Contact Person" />
                    @if ($errors->has('contact_person')) <p class="help-block">{{ $errors->first('contact_person') }}</p> @endif
                </div>
            </div>
            <div class="form-group @if ($errors->has('email')) has-error @endif">
                <label for="email"><i class="glyphicon glyphicon-user"></i> Primary Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Input::old('email') }}" placeholder="Enter Pharmacy Email Here" />
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">Pharmacy Billing Address</div>
        <div class="panel-body">
            <div class="form-group">
                <label for="username">
                <input type="checkbox" id="billing_chk"/> Check this box if Billing Address is the same as the Physical/Shipping Address</label>
            </div>
            <div class="form-group @if ($errors->has('billing_address')) has-error @endif">
                <label for="billing_address"><i class="glyphicon glyphicon-user"></i> Street Address</label>
                <input type="text" class="form-control" id="billing_address" name="billing_address" value="{{ Input::old('billing_address') }}" placeholder="Enter Pharmacy Street Address Here" />
                @if ($errors->has('billing_address')) <p class="help-block">{{ $errors->first('billing_address') }}</p> @endif
            </div>
            <div class="form-group row">
                <div class="col-md-4 @if ($errors->has('billing_city')) has-error @endif" >
                    <label for="billing_city"><i class="glyphicon glyphicon-user"></i> City</label>
                    <input type="text" class="form-control" id="billing_city" name="billing_city" value="{{ Input::old('billing_city') }}" placeholder="Enter Pharmacy City Here" />
                    @if ($errors->has('billing_city')) <p class="help-block">{{ $errors->first('billing_city') }}</p> @endif
                </div>
                <div class="col-md-4 @if ($errors->has('billing_state')) has-error @endif">
                    <label for="billing_state"><i class="glyphicon glyphicon-user"></i> State</label>
                    <input type="text" class="form-control" id="billing_state" name="billing_state" value="{{ Input::old('billing_state') }}" placeholder="Enter Pharmacy State Here" />
                    @if ($errors->has('billing_state')) <p class="help-block">{{ $errors->first('billing_state') }}</p> @endif
                </div>
                <div class="col-md-4 @if ($errors->has('billing_zipcode')) has-error @endif" >
                    <label for="billing_zipcode"><i class="glyphicon glyphicon-user"></i> Zip Code</label>
                    <input type="text" class="form-control" id="billing_zipcode" name="billing_zipcode" value="{{ Input::old('billing_zipcode') }}" placeholder="Enter Pharmacy Zip Code" />
                    @if ($errors->has('billing_zipcode')) <p class="help-block">{{ $errors->first('billing_zipcode') }}</p> @endif
                </div>
            </div>

        </div>
    </div>

    <div class="panel panel-success">
        <div class="panel-heading">Pharmacy Mailing/Shipping Address</div>
        <div class="panel-body">
            <div class="form-group">
                <label for="username">
                    <input type="checkbox" id="mailing_chk"/> Check this box if Billing Address is the same as the Physical/Shipping Address</label>
            </div>
<!--            <div class="form-group">-->
<!--                <label for="username"><i class="glyphicon glyphicon-user"></i> Name</label>-->
<!--                <input type="text" class="form-control" id="username" placeholder="Enter Pharmacy Name Here" />-->
<!--            </div>-->
            <div class="form-group @if ($errors->has('mailing_address')) has-error @endif">
                <label for="mailing_address"><i class="glyphicon glyphicon-user"></i> Street Address</label>
                <input type="text" class="form-control" id="mailing_address" name="mailing_address" value="{{ Input::old('mailing_address') }}" placeholder="Enter Pharmacy Street Address Here" />
                @if ($errors->has('mailing_address')) <p class="help-block">{{ $errors->first('mailing_address') }}</p> @endif
            </div>
            <div class="form-group row">
                <div class="col-md-4 @if ($errors->has('mailing_city')) has-error @endif">
                    <label for="mailing_city"><i class="glyphicon glyphicon-user"></i> City</label>
                    <input type="text" class="form-control" id="mailing_city" name="mailing_city" value="{{ Input::old('mailing_city') }}" placeholder="Enter Pharmacy City Here" />
                    @if ($errors->has('mailing_city')) <p class="help-block">{{ $errors->first('mailing_city') }}</p> @endif
                </div>
                <div class="col-md-4 @if ($errors->has('mailing_state')) has-error @endif">
                    <label for="mailing_state"><i class="glyphicon glyphicon-user"></i> State</label>
                    <input type="text" class="form-control" id="mailing_state" name="mailing_state" value="{{ Input::old('mailing_state') }}" placeholder="Enter Pharmacy State Here" />
                    @if ($errors->has('mailing_state')) <p class="help-block">{{ $errors->first('mailing_state') }}</p> @endif
                </div>
                <div class="col-md-4 @if ($errors->has('mailing_zipcode')) has-error @endif" >
                    <label for="mailing_zipcode"><i class="glyphicon glyphicon-user"></i> Zip Code</label>
                    <input type="text" class="form-control" id="mailing_zipcode" name="mailing_zipcode" value="{{ Input::old('mailing_zipcode') }}" placeholder="Enter Pharmacy Zip Code" />
                    @if ($errors->has('mailing_zipcode')) <p class="help-block">{{ $errors->first('mailing_zipcode') }}</p> @endif
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-ok"></i> Begin to Know My C2!</button>

{!! Form::close() !!}
<script>
    $(document).ready(function() {
        $("#billing_chk").on('click', function() {
            if ($(this).is(':checked')) {
                populateFields("billing");
            } else {
                unPopulateFields("billing");
            }
        });

        $("#mailing_chk").on('click', function() {
            if ($(this).is(':checked')) {
                populateFields("mailing");
            } else {
                unPopulateFields("mailing");
            }
        });

    });
    function unPopulateFields(fieldname) {
        $("#" + fieldname + "_address").val('');
        $("#" + fieldname + "_city").val('');
        $("#" + fieldname + "_state").val('');
        $("#" + fieldname + "_zipcode").val('');
    }

    function populateFields(fieldname) {
        $("#" + fieldname + "_address").val($("#address").val());
        $("#" + fieldname + "_city").val($("#city").val());
        $("#" + fieldname + "_state").val($("#state").val());
        $("#" + fieldname + "_zipcode").val($("#zipcode").val());
    }
</script>
@stop