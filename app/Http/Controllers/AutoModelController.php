<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutoModel;
use App\Models\Auto;

class AutoModelController extends Controller
{
    public function create()
    {
        return view('model.create',['autos'=>Auto::all()]);
    }
    public function store()
    {
        $this->getValidate();
        $model=new AutoModel();
        $model->name=request('name');
        $model->auto_id=request('auto');
        $model->save();
        return redirect('/')->with('status','Created');
    }
    protected function getValidate(): array
    {
        return \request()->validate([
            'name'=>'required|unique:autos|min:3',
            'auto'=>'required',
        ]);
    }
}
