<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iot extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'device_one_consumption',
        'device_two_consumption',
        ];
}
