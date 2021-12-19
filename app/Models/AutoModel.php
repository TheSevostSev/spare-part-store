<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auto;
use App\Models\ReservePart;

class AutoModel extends Model
{
    use HasFactory;
    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }
    public function reservepart()
    {
        return $this->belongsToMany(ReservePart::class);
    }
}
