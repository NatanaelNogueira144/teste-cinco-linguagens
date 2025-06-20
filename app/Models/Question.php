<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'language_id',
        'description'
    ];
    
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
