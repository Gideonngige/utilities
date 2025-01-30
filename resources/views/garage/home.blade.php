@extends('garage.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<div class="garage">
    <h3 class="alert alert-custom">Welcome to G-Auto Garage</h3>
    <img src="{{ asset('images/garage.jpg') }}" alt="garage" class="img-fluid">
</div>
<div class="">
    <p class="alert alert-custom">Our Services</p>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header"><h4>Car repair</h4></div>
                <div class="card-body">
                    <img src="{{ asset('images/garage.jpg') }}" alt="car repair" class="img-fluid-service">
                    <p>We repair cars at an affordable price.Car engines - we deal them incase of any malfunction. we are here to deal with them.</p>
                    <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#order" >Order Repair</button>
                </div>
                <div class="card-footer"><i>we service you drive</i></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header"><h4>Motors repair</h4></div>
                <div class="card-body">
                    <img src="{{ asset('images/motor.jpg') }}" alt="car repair" class="img-fluid-service">
                    <p>We repair any kind of motors. We service your motor at an affordable price. We make your motor life continue. Let's make your motor's life better</p>
                    <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#order">Order Repair</button>
                </div>
                <div class="card-footer"><i>we service you drive</i></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header"><h4>Engines repair</h4></div>
                <div class="card-body">
                    <img src="{{ asset('images/engine.jpg') }}" alt="car repair" class="img-fluid-service">
                    <p>We repair car, lorry, tractor, buses, boat, motorcycle and bicycle engines. At an affordable price, we make your machine live again.</p>
                    <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#order">Order Repair</button>
                </div>
                <div class="card-footer"><i>we service you drive</i></div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <p class="alert alert-custom">About Us</p>
    <div class="garage-about-us">
        <p>G-Auto Garage is a leading car repair company in the city. We have been providing car repairs since 2000. Our team of skilled mechanics and technicians work hard to make your car life continue. We have been in service for the past 15 years. We are here to service your car to live more. Let's servive and you drive your machine.</p>
        
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <h3>Contact us</h3>
        <p>Website: <a href="">www.gautogarage.com</a></p>
        <p>Email: <a href="">info@gautogarage.com</a>
        <p>Phone: <a href="">+254 712 345 678</a></p>
    </div>
    <div class="col-sm-4">
        <h3>Find us</h3>
        <p>Location: Lamu-hindi, opposite equity bank</p>
        <p>Email: <a href="">info@gautogarage.com</a>
        <p>Phone: <a href="">+254 712 345 678</a></p>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="order">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Order Repair</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="{{ route('payment') }}">
            @csrf
            <label>Location</label><br>
            <select name="location" id="location" class="form-control" required onblur="calcDeposit()" required>
                <option value="ndeu">Ndeu</option>
                <option value="hindi town">Hindi Town</option>
                <option value="sabasaba">Sabasaba</option>
                <option value="Roka">Roka</option>
            </select><br>
            <label>Deposit Fee</label><br>
            <input type="number" name="deposit" id="deposit" class="form-control" placeholder="Deposit fee" required readonly><br>
            <input type="submit" value="Order" class="btn btn-custom">
          </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>

  <script>
    function calcDeposit(){
        var deposit = document.getElementById('deposit');
        var location = document.getElementById('location');
        if(location.value == "ndeu"){
            deposit.value = 500;
        }
        else if(location.value == "hindi town"){
            deposit.value = 700;
        }
        else if(location.value == "sabasaba"){
            deposit.value = 1000;
        }
        else if(location.value == "Roka"){
            deposit.value = 1500;
        }
    }
  </script>
  @stop