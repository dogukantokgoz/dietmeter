<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    public $table = "user_profile";

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'weight',
        'height',
        'age',
        'gender',
        'activity_level',
        'diet_type',
        'diet_type2'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
