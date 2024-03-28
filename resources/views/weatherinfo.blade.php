@extends('master')
@section('title')
    Weather Dashboard
@endsection

@section('content')
    <div class="container" style="background-color: #E0FFFF;">
        <div class="row ">
            <div class="col-md-4">
                <form class="form-group ms-4" action="{{ route('get-weather') }}" method="post">
                
                    @csrf
                    <label class="fs-4 fw-bold" for="location">Enter a city name</label>
                    <input type="text" id="location" name="location" class="form-control " placeholder="E.g.,Newyork, London, Tokyo" aria-label="Search for city" aria-describedby="button-addon2">
                    <button class="btn btn-primary w-100 mt-4" type="submit" id="search">Search</button>
                    <div class="d-flex align-items-center mt-4">
                        <hr class="flex-grow-1">
                        <span class="px-2">or</span>
                        <hr class="flex-grow-1">
                    </div>
                    <button class="btn btn-secondary w-100 mt-4" type="button" id="local">Use Current Location</button>
                </form>
            </div>
            <div class="col-md-8">
                @foreach ($weatherData as $key => $value)
                <div class="d-flex justify-content-between p-3 m-3 bg-white rounded">
                    <div class="">
                        @if ($key === 'location')
                        <h3 class="fs-5">{{ $value['name'] }} ({{ $value['localtime'] }})</h3>
                        @elseif($key === 'current')
                        
                        <div class="fs-6 mt-3">
                            <p>Temperature: {{ $value['temp_c'] }} &#8451</p>
                            <p>Wind: {{ number_format($value['wind_mph']*1609.34/3600, 2) }} M/S</p>
                            <p>Humidity: {{ $value['humidity'] }} %</p>
                        </div>
                        @endif
                    </div>
                    @if($key === 'current')
                    <div>
                        <img src="{{ $value['condition']['icon'] }}" alt="" style="width: 150px;">
                    </div>
                    @endif
                </div>
                @endforeach
                
                <div>
                    <p style="font-size: 22px; font-weight:bold; margin-left:10px;">4-Day Forecast</p>
                    @foreach ($weatherData as $key =>  $forecast)
                        
                        @if ($key === 'forecast')
                            @foreach ($forecast as $forecastday)
                            <ul style="display: flex; justify-content:space-around; list-style: none">
                                <li style="background-color: #595f64; padding:10px; border-radius: 15px; color:#fff; display:flex; justify-content:center; align-items: center; flex-direction: column">
                                    <h3 style="font-size: 18px">({{ $forecastday[1]['date'] }})</h3>
                                    <img src="{{ $forecastday[1]['day']['condition']['icon'] }}" alt="" style="width:30px;">
                                    <div style="font-size: 12px">
                                        <p>Temperature: {{ $forecastday[1]['day']['maxtemp_c'] }} &#8451</p>
                                        <p>Wind: {{ number_format($forecastday[1]['day']['maxwind_mph']*1609.34/3600, 2) }} M/S</p>
                                        <p>Humidity: {{ $forecastday[1]['day']['avghumidity'] }} %</p>
                                    </div>
                                </li>

                                <li style="background-color: #595f64; padding:10px; border-radius: 15px; color:#fff; display:flex; justify-content:center; align-items: center; flex-direction: column">
                                    <h3 style="font-size: 18px">({{ $forecastday[2]['date'] }})</h3>
                                    <img src="{{ $forecastday[2]['day']['condition']['icon'] }}" alt="" style="width:30px;">
                                    <div style="font-size: 12px">
                                        <p>Temperature: {{ $forecastday[2]['day']['maxtemp_c'] }} &#8451</p>
                                        <p>Wind: {{ number_format($forecastday[2]['day']['maxwind_mph']*1609.34/3600, 2) }} M/S</p>
                                        <p>Humidity: {{ $forecastday[2]['day']['avghumidity'] }} %</p>
                                    </div>
                                </li>

                                <li style="background-color: #595f64; padding:10px; border-radius: 15px; color:#fff; display:flex; justify-content:center; align-items: center; flex-direction: column">
                                    <h3 style="font-size: 18px">({{ $forecastday[3]['date'] }})</h3>
                                    <img src="{{ $forecastday[3]['day']['condition']['icon'] }}" alt="" style="width:30px;">
                                    <div style="font-size: 12px">
                                        <p>Temperature: {{ $forecastday[3]['day']['maxtemp_c'] }} &#8451</p>
                                        <p>Wind: {{ number_format($forecastday[3]['day']['maxwind_mph']*1609.34/3600, 2) }} M/S</p>
                                        <p>Humidity: {{ $forecastday[3]['day']['avghumidity'] }} %</p>
                                    </div>
                                </li>

                                <li style="background-color: #595f64; padding:10px; border-radius: 15px; color:#fff; display:flex; justify-content:center; align-items: center; flex-direction: column">
                                    <h3 style="font-size: 18px">({{ $forecastday[4]['date'] }})</h3>
                                    <img src="{{ $forecastday[4]['day']['condition']['icon'] }}" alt="" style="width:30px;">
                                    <div style="font-size: 12px">
                                        <p>Temperature: {{ $forecastday[4]['day']['maxtemp_c'] }} &#8451</p>
                                        <p>Wind: {{ number_format($forecastday[4]['day']['maxwind_mph']*1609.34/3600, 2) }} M/S</p>
                                        <p>Humidity: {{ $forecastday[4]['day']['avghumidity'] }} %</p>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
    

