<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public $table = "country";

    protected $fillable = [
        'user_id',
        'reference_type',
        'reference_id',
        'type',
        'comments',
        'image',
    ];

}
