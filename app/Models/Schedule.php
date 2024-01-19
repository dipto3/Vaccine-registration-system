<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    const NOT_VACCINATED = 'Not vaccinated';
    const SCHEDULED = 'Scheduled';
    const VACCINATED = 'Vaccinated';

    protected $fillable = [
        'user_id',
        'center_id',
        'scheduled_at',
        'status',
    ];

    public function userInfo()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }
}
