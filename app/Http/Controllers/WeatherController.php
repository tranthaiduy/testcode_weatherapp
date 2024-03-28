<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherModel;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function weather(){
        return view('weather');
    }
    public function getWeather(Request $request)
    {
        
        $location = $request->input('location');

        
        $weatherData = [];

        if (!empty($location)) {
           
            $client = new Client();

            
            try {
                $response = $client->get('https://api.weatherapi.com/v1/forecast.json', [
                    'query' => [
                        'key' => '2d3bdd34e36341a290b42201242803', 
                        'q' => $location, 
                        'days' => 5 
                    ]
                ]);

                
                $data = $response->getBody()->getContents();

                $weatherData = json_decode($data, true);
                if(isset($weatherData['current'])){
                    
                    WeatherModel::updateOrCreate(
                        ['location' => $location],
                        [
                            'temperature' => $weatherData['current']['temp_c'],
                            'humidity' => $weatherData['current']['humidity'],
                            'wind' => $weatherData['current']['wind_mph']
                        ]
                    );
                } else {
                    return 'Không thể lấy thông tin thời tiết cho địa điểm đã chọn.';
                }
            } catch (\Exception $e) {
                
                return $e->getMessage();
            }
        } else {
            
            return 'Vui lòng nhập địa điểm để tra cứu thời tiết.';
        }
        
        return view('weatherinfo', compact('weatherData'));
    }

    public function history(){
        $history = WeatherModel::all();

        return view('history', compact('history'));
    }


   

}
