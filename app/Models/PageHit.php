<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageHit extends Model
{
    protected $fillable = [
        'uuid',
        'ip_address',
        'visit_date',
        'visit_day',
        'country',
        'browser',
        'device',
        'visit_from',
        'latitude',
        'longitude',
    ];
}
