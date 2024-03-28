@extends('master')
@section('title')
    History
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Location</th>
                    <th scope="col">Temperature</th>
                    <th scope="col">Wind</th>
                    <th scope="col">Humidity</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($history as $key => $value)
                <tr>
                    <th scope="row">{{ $value['location'] }}</th>
                    <td>{{ $value['temperature'] }} &#8451</td>
                    <td>{{ number_format($value['wind']*1609.34/3600, 2) }} M/S</td>
                    <td>{{ $value['humidity'] }} %</td>
                </tr>
            @endforeach   
            </tbody>
        </table>
    </div>
    
@endsection