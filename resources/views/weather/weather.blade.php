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
    <title>weather</title>
    <link rel="stylesheet" href="{{ asset('css/weather.css') }}">
</head>
<body>
    <div class="container">
        <h1>Weather App</h1>
        <form action="{{ route('weather')}}" method="post">
            @csrf
                <table width="100%">
                    <tr>
                        <td>
                            <input type="text" class="form-control" id="city"placeholder="enter city name" name="city" required>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-custom">Get Weather</button>
                        </td>
                    </tr>
                </table>
        </form>
        <div class="row">
            <div class="col-sm-4">
                @if(isset($temp))
                <img src="https://openweathermap.org/img/w/{{$icon}}.png"; class="icon" alt="icon">
                <p>City: {{$name}}</p>
                <p>Temp: {{$temp}} 0c</p>
                <p>Description: {{$description}}</p>
                <p>Wind Speed: {{$wind_speed}} km/hr</p>
                <p>Humidity: {{$humidity}}</p>
                <p>Pressure: {{$pressure}}</p>
                <p>Sunrise: {{$sunrise}}</p>
                <p>Sunset: {{$sunset}}</p>
                @elseif (isset($error))
                <p>{{$error}}</p>
                
                @endif
    
            </div>
        </div>
    </div>
    
</body>
</html>