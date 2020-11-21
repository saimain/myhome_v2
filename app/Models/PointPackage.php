<?php

namespace App\Models;

use App\Models\PointOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PointPackage extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(PointOrder::class);
    }
}
