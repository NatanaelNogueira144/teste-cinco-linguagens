<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'user_id',
        'language_id',
        'total'
    ];

    public function language() 
    {
        return $this->belongsTo(Language::class);
    }
}
