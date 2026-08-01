<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinRequest extends Model
{
    protected $table = "requests";
    protected $primaryKey="user_id";
    protected $fillable = [
        "user_id",
        "status",
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
