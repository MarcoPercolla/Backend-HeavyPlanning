<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Http\Requests\StoreOperatorRequest;
use App\Http\Requests\UpdateOperatorRequest;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operators = Operator::all();
        $specializations = Specialization::all();
        return view('layouts.Homepage',compact('operators', 'specializations'));
       
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.operators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperatorRequest $request)
    {
        /*$validate = $request->validated();
        $new_operator= new Operator();
        $new_operator ->fill($validate);
        $new_operator['user_id']=Auth::id();
        $new_operator->save();

        return redirect()->route('homepage');*/
    }

    /**
     * Display the specified resource.
     */
    public function show(Operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operator $operator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperatorRequest $request, Operator $operator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $operator)
    {
        //
    }
}
