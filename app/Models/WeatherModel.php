<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherModel extends Model
{
    //use HasFactory;
    
    protected $table = 'tbl_history'; // Tên của bảng trong cơ sở dữ liệu

    public $timestamps = false;
    protected $fillable = [
        'location', 'temperature', 'humidity', 'wind'
    ];
    
}
