<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;
    protected $fillable = [
    'house_id',
    'agent_id',
    'user_id',
    'discover',
    'title' ,
    'type' ,
    'location',
    'bedrooms',
    'bathrooms',
    'garages' ,
    'sqft' ,
    'description'
];



}
