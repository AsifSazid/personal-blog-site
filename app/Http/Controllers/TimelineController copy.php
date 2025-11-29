<?php

namespace App\Http\Controllers;

use App\Models\Timeline;

class TimelineController extends BaseController
{
    public function __construct()
    {
        $this->model = Timeline::class;
    }
}
