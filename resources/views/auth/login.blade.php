@extends('master')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="login" role="form" method="POST" action="/auth/login">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <h1 class="text-uppercase text-center"><strong>C2Log Sign In</strong></h1>
        <div class="form-group">
            <label for="username"><i class="glyphicon glyphicon-user"></i> Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
        </div>
        <div class="form-group">
            <label for="password"><i class="glyphicon glyphicon-alert"></i> Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
        </div>
        <button type="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-ok"></i> Log me in</button>
        <div class="form-group">
            <label class="form-control-static"><a href="/accounts/create">New User ?</a> Register here for your myc2log experience!</label>
            <label class="form-control-static"><a href="#">I can't access my account</a></label>
        </div>




<!--						<div class="form-group">-->
<!--							<div class="col-md-6 col-md-offset-4">-->
<!--								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">-->
<!--									Login-->
<!--								</button>-->
<!---->
<!--								<a href="/password/email">Forgot Your Password?</a>-->
<!--							</div>-->
<!--						</div>-->
</form>


@endsection
