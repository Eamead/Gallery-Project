<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['name', 'description'];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function pdfs()
    {
        return $this->hasMany(Pdf::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
