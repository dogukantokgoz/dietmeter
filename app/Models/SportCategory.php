<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkoutMoves;

class SportCategory extends Model
{
    use HasFactory;

    public $table = "sport_categories";

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    public function moves() {
        return $this->belongsTo(WorkoutMoves::class);
    }
}
