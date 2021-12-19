<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\ReservePart;

class ReceiptController extends Controller
{
    public function index()
    {
        $receipt=Receipt::find(request('order_id'));
        if($receipt===null) return redirect('/');
        return redirect('/reservepart/'.$receipt->reserve_part_id.'/'.$receipt->id);

    }
    public function show(ReservePart $reservepart, Receipt $receipt)
    {
        return view('part.showorder',['part'=>$reservepart,'receipt'=>$receipt]);
    }
    public function cancel(Receipt $receipt)
    {
        $part=ReservePart::find($receipt->reserve_part_id);
        $part->amount+=$receipt->amount;
        $part->save();
        $receipt->delete();
        return redirect('/');
    }
    public function give(Receipt $receipt)
    {
        $receipt->delete();
        return redirect('/')->with('status','Give');
    }
}
