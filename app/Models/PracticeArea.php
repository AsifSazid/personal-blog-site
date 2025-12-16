<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PracticeArea extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_area');
    }
}
