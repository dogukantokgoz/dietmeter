<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SportCategories;

class WorkoutMoves extends Model
{
    use HasFactory;
    
    public $table = "workout_moves";

    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'name'
    ];

    public function category() {
        return $this->hasOne(SportCategory::class);
    }
}
