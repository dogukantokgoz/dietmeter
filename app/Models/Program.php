<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public $table = "program";

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'category',
        'move',
        'move_amount',
        'set_amount',
        'number_of_program',
    ];

    public function user() {
        return $this->hasOne(User::class);
    }
}
