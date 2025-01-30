@extends('garage.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
@if(isset($select_notifications))
    @foreach($select_notifications as $notification)
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{ $notification->notification}}
      </div>
    @endforeach
@else
    <p class="alert alert-custom">No notifications</p>
@endif
@stop