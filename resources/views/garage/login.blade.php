@extends('garage.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="login">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Login</h2><hr>
        <label>Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required><br>
       <label>Password</label>
       <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required><br>
       <input type="submit" value="Login" class="btn btn-custom">
        <p>Do not have an account? <a href="{{ route('register')}}">Register here</a></p>
        @if(isset($message))
    <p class="alert alert-dark" id="alert">{{$message}}</p>
    @endif
    </form>
</div>
@stop