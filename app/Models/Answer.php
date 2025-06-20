<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'user_id',
        'question_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
