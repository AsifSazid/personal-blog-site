<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Gallery::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Gallery::class, 'parent_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
