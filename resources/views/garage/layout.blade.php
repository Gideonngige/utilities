<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>garage</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-custom">
        <div class="container-fluid">
          <a class="navbar-brand" href="javascript:void(0)">Garage</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('garage')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register')}}">Register</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="{{ route('notifications')}}">Notifications</a>
              </li>
            </ul>
            <p style="float:right;color:white;">@if(isset($email)) {{$email}} @endif</p>
          </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    @yield('footer')
    <script>
      setTimeout(function(){
        document.getElementById('alert').style.display = 'none';
    },3000);
    </script>
    
</body>
</html>