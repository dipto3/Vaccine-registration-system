<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    const STATUS_NOT_VACCINATED = 'Not vaccinated';
    const STATUS_SCHEDULED = 'Scheduled';
    const STATUS_VACCINATED = 'Vaccinated';

    protected $fillable = [
        'name',
        'location',
        'dailyLimit',
        'status',
    ];
}
