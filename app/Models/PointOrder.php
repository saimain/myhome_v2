<?php

namespace App\Models;

use App\Models\User;
use App\Models\PointPackage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PointOrder extends Model
{
    use HasFactory;

    // Relation

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(PointPackage::class, 'point_package_id');
    }
}
