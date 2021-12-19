<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auto;
use App\Models\Receipt;

class ReservePart extends Model
{
    public function auto()
    {
        return $this->belongsToMany(Auto::class);
    }
    public function model()
    {
        return $this->belongsToMany(AutoModel::class);
    }
    public function receipt()
    {
        return $this->hasMany(Receipt::class);
    }
}
