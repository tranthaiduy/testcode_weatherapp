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
                
            </div>
        </div>
    </div>
@endsection

