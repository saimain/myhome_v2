<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPoint extends Model
{
    use HasFactory;

    // Relations

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
