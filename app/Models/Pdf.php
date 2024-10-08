<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'file_path', 'estimated_date',
        'estimated_location', 'privacy_setting', 'gallery_id', 'is_featured',
        'additional_info', 'copyright_info'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
