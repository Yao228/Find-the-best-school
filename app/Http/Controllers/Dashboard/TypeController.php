<?php

namespace App\Http\Controllers\Dashboard;

use App\Type;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $types = Type::paginate(8);
        
        return view('dashboard.types.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTypeRequest $request)
    {
        Type::create([
            'name'=> $request->name
        ]);
        
        Flashy::success('Type créé avec succès.');
        //session()->flash('success', 'Type créé avec succès');
        
        return redirect(route('types.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('dashboard.types.create')->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $type->update([
            'name'=> $request->name
        ]);

        $type->save();
        
        Flashy::success('Type mis à jour avec succès');
        //session()->flash('success', 'Type mis à jour avec succès');
        
        return redirect(route('types.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        
        Flashy::success('Type supprimé avec succès.');
        //session()->flash('success', 'Type supprimé avec succès.');

        return redirect(route('types.index'));
    }
}
