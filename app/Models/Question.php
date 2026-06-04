<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'language_id',
        'description'
    ];

    protected $appends = [
        'short_description'
    ];
    
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    protected function shortDescription(): Attribute 
    {
        return Attribute::make(
            get: fn () => strlen($this->description) > 50 ? (substr($this->description, 0, 50) . "...") : $this->description
        );
    }
}
