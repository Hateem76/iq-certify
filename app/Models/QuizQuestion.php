<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id',
        'title',
        'correct_option_id',
        'category',
        'question_image',
    ];
    public function option()
    {
        return $this->hasMany(QuizQuestionOption::class,'question_id');
    }


    public function categoryResults()
    {
        dd($this);
        return $this->where('category', $this->category);
    }



}
