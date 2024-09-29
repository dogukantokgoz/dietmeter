<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'height',
        'age',
        'gender',
        'activity_level',
        'diet_type',
        'diet_type'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
