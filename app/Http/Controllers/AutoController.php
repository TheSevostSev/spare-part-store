<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\AutoModel;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function create()
    {
        return view('car.create');
    }
    public function store()
    {
        $this->getValidate();
        $auto=new Auto();
        $auto->name=request('name');
        $auto->year=request('year');
        $auto->url=request('picture');
        $auto->save();
        return redirect('/')->with('status','Created');
    }
    protected function getValidate(): array
    {
        return \request()->validate([
            'name'=>'required|unique:autos|min:3',
            'year'=>'required|integer',
            'picture'=>'required',
        ]);
    }
}
