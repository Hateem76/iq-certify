<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'status',
        'description',
        'image',
        'time_duration',
    ];


    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
    public function result()
    {
        return $this->hasMany(QuizResult::class);
    }
}
