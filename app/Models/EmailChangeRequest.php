<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailChangeRequest extends Model
{
    protected $primaryKey = "user_id";
    protected $fillable = [
        "user_id",
        "new_email"
    ];
}
