<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReservePart;

class Receipt extends Model
{
    use HasFactory;

    public function reservepart()
    {
        return $this->belongsTo(ReservePart::class);
    }
    public function FillForeignKey($id)
    {
        $this->reserve_part_id=$id;
        $this->save();
        return $this;
    }
}