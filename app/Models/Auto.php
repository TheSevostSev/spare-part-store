<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReservePart;
use App\Models\AutoModel;

class Auto extends Model
{

    public function reservepart()
    {
        return $this->belongsToMany(ReservePart::class);
    }
    public function automodel()
    {
        return $this->hasMany(AutoModel::class);
    }
}
