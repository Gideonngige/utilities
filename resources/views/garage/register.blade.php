@extends('garage.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<div class="login">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h2>Register</h2><hr>
        <label>Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required><br>
        <label>Phonenumber</label>
        <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="Enter phonenumber" required><br>
       <label>Password</label>
       <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required><br>
       <label>Confirm Password</label>
       <input type="password" name="password2" id="password2" class="form-control" placeholder="Enter password" required><br>
       <input type="submit" value="Login" class="btn btn-custom">
        <p>Already have an account? <a href="{{ route('login')}}">Login here</a></p>
        @if(isset($message))
    <p class="alert alert-dark" id="alert">{{$message}}</p>
    @endif
    </form>
    
</div>

@stop