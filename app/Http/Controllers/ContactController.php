<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\Revocation;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function revocation()
    {
        Mail::to("sevostsev@gmail.com")
        ->send(new Revocation(request('subject'),request('text'), auth()->user()->email));
        return redirect('/');
    }
}
