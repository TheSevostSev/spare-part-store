<?php

namespace App\Http\Controllers;
use App\Models\ReservePart;
use App\Models\Auto;
use App\Models\AutoModel;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function show()
    {
        $all_parts=ReservePart::all();
        $rand=random_int(ReservePart::first()->id,ReservePart::latest()->first()->id);
        $popular_parts=ReservePart::where('id', '<', $rand+3)->limit(3)->get();
        $new_parts=ReservePart::latest()->limit(5)->get();
        $priced_parts=ReservePart::where('amount', '<=', 20)->limit(5)->get();
        return view('layouts.store',['all_parts'=>$all_parts,'url'=> "/reservepart",
        'priced_parts'=>$priced_parts, 'new_parts'=>$new_parts,'popular_parts'=>$popular_parts]);
    }
    public function index()
    {
        $model=AutoModel::where('name', request('text'))->first();
        $auto=Auto::where('name', request('text'))->first();
        $parts=ReservePart::where('name', request('text'))->get();
        if($parts->first()!=null)return view('store.search',['parts'=>$parts])->with('status','Search');
        else
        {
            if($auto!=null) return view('store.search',['parts'=>$auto->reservepart->all()])->with('status','Search');
            else
            {
                if ($model!=null) return view('store.search',['parts'=>$model->reservepart->all()])->with('status','Search');
                else return redirect('/')->with('status','NotFound');
            }
        }
    }
}
