<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ai extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'Expected_consumption',
        'expected_money',
        'co2_saving',

    ];
}
