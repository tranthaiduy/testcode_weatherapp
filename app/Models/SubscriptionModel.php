<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionModel extends Model
{
    protected $table = 'tbl_notification'; 

    protected $fillable = [
        'email', 'confirmed' 
    ];

    public $timestamps = false;
}
