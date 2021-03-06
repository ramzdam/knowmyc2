@extends('master')

@section('content')
    <form id="login">
        <h1 class="text-uppercase text-center"><strong>C2Log Sign In</strong></h1>
        <div class="form-group">
            <label for="username"><i class="glyphicon glyphicon-user"></i> Username</label>
            <input type="text" class="form-control" id="username" placeholder="Username" />
        </div>
        <div class="form-group">
            <label for="password"><i class="glyphicon glyphicon-alert"></i> Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" />
        </div>
        <button type="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-ok"></i> Log me in</button>
        <div class="form-group">
            <label class="form-control-static"><a href="/accounts/create">New User ?</a> Register here for your myc2log experience!</label>
        </div>
    </form>
@stop