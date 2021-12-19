<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Receipt;
use App\Models\ReservePart;
use App\Mail\BuyReceipt;

class PaymentController extends Controller
{
    public function create($id)
    {
        $part= ReservePart::find($id);
        if((int)request('amount')>$part->amount) return redirect('/');
        $receipt = new Receipt();
        $receipt->amount=(int)request('amount');
        $receipt->FillForeignKey($id);
        $part->amount-=(int)request('amount');
        $part->save();
        $name = $part->name;
        Mail::to(auth()->user()->email)
            ->send(new BuyReceipt($name,$receipt->id));
        return redirect('/')->with('status', 'Buy!');
    }
}
