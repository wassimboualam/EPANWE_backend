<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        "title",
        "text",
        "age_group",
        "category"
    ];

}
