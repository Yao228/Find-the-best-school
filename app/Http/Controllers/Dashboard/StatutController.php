<?php

namespace App\Http\Controllers\Dashboard;

use App\Statut;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStatutRequest;
use App\Http\Requests\UpdateStatutRequest;

class StatutController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $statuts = Statut::paginate(8);
        
        return view('dashboard.statuts.index')->with('statuts', $statuts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.statuts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStatutRequest $request)
    {
        Statut::create([
            'name'=> $request->name
        ]);
        Flashy::success('Statut créé avec succès.');
        //session()->flash('success', 'Statut créé avec succès');
        
        return redirect(route('statuts.index'));
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
    public function edit(Statut $statut)
    {
        return view('dashboard.statuts.create')->with('statut', $statut);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatutRequest $request, Statut $statut)
    {
        $statut->update([
            'name'=> $request->name
        ]);

        $statut->save();

        Flashy::success('Statut mis à jour avec succès.');
        
        //session()->flash('success', 'Statut mis à jour avec succès');
        
        return redirect(route('statuts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statut $statut)
    {
        $statut->delete();

        Flashy::success('Statut supprimé avec succès.');
        //session()->flash('success', 'Statut supprimé avec succès.');

        return redirect(route('statuts.index'));
    }
}
