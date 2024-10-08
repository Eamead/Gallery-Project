<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'type'];

    public function photos()
    {
        return $this->belongsToMany(Photo::class, 'photo_tags');
    }
}

