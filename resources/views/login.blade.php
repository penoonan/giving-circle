@extends('app')

@section('content')
<h1>Giving Circle!</h1>
@include('partials.errors')
<div class="panel panel-info" id="app">
    <div class="panel-heading">
        <h3 class="panel-title">Log The Fuck In</h3>
    </div>
    <div class="panel-body">
        <form class="form" action="{{ url('/login') }}" method="post">
            <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control" value="p.e.noonan@gmail.com">
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" value="password">
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">Submit</button>
            </div>
        </form>
    </div>

    <div class="panel-heading">
        <h3 class="panel-title">Or Make a Damn Account Already</h3>
    </div>
    <div class="panel-body">
        <form class="form" action="{{ url('/register') }}" method="post">
            <div class="form-group">
                <label class="control-label" for="first_name">First Name</label>
                <input id="first_name" name="first_name"  class="form-control" >
            </div>
            <div class="form-group">
                <label class="control-label" for="last_name">Last Name</label>
                <input id="last_name" name="last_name"  class="form-control" >
            </div>
            <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control" >
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control" >
            </div>
            <div class="form-group">
                <label class="control-label" for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" >
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">Submit</button>
            </div>

        </form>

    </div>
</div>
@stop