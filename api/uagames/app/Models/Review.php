<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lname',
        'double',
        'phone',
        'email',
        'game_id',
        'console_id',
        'comment_id',
    ];
}
