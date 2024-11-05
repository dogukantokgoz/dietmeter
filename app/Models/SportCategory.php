<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportCategory extends Model
{
    use HasFactory;

    public $table = "sport_categories";

    public $timestamps = true;

    protected $fillable = [
        'category_name'
    ];
}
