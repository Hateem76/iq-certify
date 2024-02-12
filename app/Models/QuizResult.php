<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;
    protected  $fillable = [
        'quiz_id',
        'unique_key',
        'user_id',
        'question_answer',
        'quiz_is_passed',
        'points',
        'timer',
        'email_sent_at',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
