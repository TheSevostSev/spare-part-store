<?php

namespace App\Http\Controllers;
use App\Models\ReservePart;
use App\Models\Auto;
use App\Models\AutoModel;

use Illuminate\Http\Request;

class ReservePartController extends Controller
{
    public function show(ReservePart $reservepart)
    {
        //$part=ReservePart::find($id);
        return view('part.showpart',['part'=>$reservepart]);
    }
    public function create()
    {
        $autos=Auto::all()->sortBy('name');
        $models=AutoModel::all()->sortBy('name');
        return view('part.create',["autos"=>$autos,"models"=>$models]);
    }
    public function index()
    {
        $part=ReservePart::where('number', (int)request('number'))->first();
        if($part===null) return redirect('/');
        return redirect('/reservepart/'.$part->id);
    }
    public function store()
    {
        $this->getValidate();
        $part = new ReservePart();
        $part->name=request('name');
        $part->description=request('description');
        $part->number=request('number');
        $part->url=request('picture');
        $part->amount=request('amount');
        $part->price=request('price');
        $model=AutoModel::find(request('model'));
        $auto=Auto::find(request('auto'));
        $part->save();
        $part->auto()->attach($auto->id);
        $part->model()->attach($model->id);
        return redirect('/');
    }

    public function edit(ReservePart $reservepart)
    {
        $autos=Auto::all();
        $models=AutoModel::all();
        return view('part.edit',["part"=>$reservepart,"autos"=>$autos,"models"=>$models]);
    }

    public function update(Request $request, ReservePart $reservepart)
    {
        
        // $this->getValidate();
        
// dd('after validation');

        $reservepart->name=request('name');
        $reservepart->description=request('description');
        $reservepart->number=request('number');
        $reservepart->url=request('picture');
        $reservepart->amount=request('amount');
        $reservepart->price=request('price');
        
        $reservepart->save();

        $model = AutoModel::find((int)request('model'));
        $auto = Auto::find((int)request('auto'));
        
        $reservepart->auto()->detach();
        $reservepart->model()->detach();
        $reservepart->auto()->attach($auto->id);
        $reservepart->model()->attach($model->id);
        
        return redirect('/');

    }

    public function delete(ReservePart $reservepart)
    {
        $reservepart->delete();
        return redirect('/');
    }

    public function show_amount(ReservePart $reservepart)
    {
        return view('part.amount',['part'=>$reservepart]);
    }

    public function add_amount(ReservePart $reservepart)
    {
        $reservepart->amount+=(int)request('amount');
        $reservepart->save();
        return redirect('/');
    }

    protected function getBindsValidation()
    {
        $auto=Auto::find(request('auto'));
        if($auto->automodel()->find(request('model'))) return back();
    }

    protected function getValidate(): array
    {
        $this->getBindsValidation();
        return \request()->validate([
            'name'=>'required|min:3',
            'number'=>'required|integer|unique:reserve_parts',
            'description'=>'required',
            'amount'=>'required|integer',
            'price'=>'required|integer',
        ]);
    }
}
