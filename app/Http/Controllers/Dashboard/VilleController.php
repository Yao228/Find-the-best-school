<?php

namespace App\Http\Controllers\Dashboard;

use App\Ville;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVilleRequest;
use App\Http\Requests\UpdateVilleRequest;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $villes = Ville::paginate(8);
        
        return view('dashboard.villes.index')->with('villes', $villes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.villes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVilleRequest $request)
    {
        Ville::create([
            'name'=> $request->name
        ]);

        Flashy::success('Ville créée avec succès.');
        
        //session()->flash('success', 'Ville créé avec succès');
        
        return redirect(route('villes.index'));
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
    public function edit(Ville $Ville)
    {
        return view('dashboard.villes.create')->with('ville', $Ville);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVilleRequest $request, Ville $Ville)
    {
        $Ville->update([
            'name'=> $request->name
        ]);

        $Ville->save();
        
        Flashy::success('Ville mise à jour avec succès.');
        //session()->flash('success', 'Statut mis à jour avec succès');
        
        return redirect(route('villes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ville $Ville)
    {
        $Ville->delete();

        Flashy::success('Ville supprimée avec succès.');

        //session()->flash('success', 'Statut supprimé avec succès.');

        return redirect(route('villes.index'));
    }
}
