<?php

namespace App\Http\Controllers;
use App\Models\ReservePart;
use App\Models\Auto;
use App\Models\AutoModel;

use Illuminate\Http\Request;

class SearchPartController extends Controller
{
    public function show()
    {
        $parts=ReservePart::all()->sortBy('name');
        $autos=Auto::all()->sortBy('name');
        $models=AutoModel::all()->sortBy('name');
        return view('search',['parts'=>$parts,'autos'=>$autos,'models'=>$models]);
    }
    public function index()
    {
        $model=AutoModel::where('name', request('model'))->firstOrFail();
        $auto=$model->auto;
        $part=$model->reservepart->where('name',request('part'))->first();
        if($auto->name===request('auto') && $part!=null)
        {
            return redirect('/reservepart/'.$part->id);
        }
        else
        {
            return redirect('/')->with('status','NotFound');
        }
    }
}
