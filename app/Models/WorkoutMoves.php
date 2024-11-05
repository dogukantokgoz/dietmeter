<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutMoves extends Model
{
    use HasFactory;
    
    public $table = "workout_moves";

    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'name'
    ];
}
