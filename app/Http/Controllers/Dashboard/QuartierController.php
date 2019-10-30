<?php

namespace App\Http\Controllers\Dashboard;

use App\Ville;
use App\Quartier;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuartierRequest;
use App\Http\Requests\UpdateQuartierRequest;

class QuartierController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $quartiers = Quartier::paginate(8);
        
        return view('dashboard.quartiers.index')->with('quartiers', $quartiers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.quartiers.create')->with('villes', Ville::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuartierRequest $request)
    {
        Quartier::create([
            'name'=> $request->name,
            'ville_id' => $request->ville
        ]);
        Flashy::success('Quartier créé avec succès.');
        //session()->flash('success', 'Statut créé avec succès');
        
        return redirect(route('quartiers.index'));
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
    public function edit(Quartier $quartier)
    {
        return view('dashboard.quartiers.create')
        ->with('quartier', $quartier)
        ->with('villes', Ville::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuartierRequest $request, Quartier $quartier)
    {
        $quartier->update([
            'name'=> $request->name,
            'ville_id' => $request->ville
        ]);

        $quartier->save();
        
        Flashy::success('Quartier mis à jour avec succès.');
        //session()->flash('success', 'Quartier mis à jour avec succès');
        
        return redirect(route('quartiers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quartier $quartier)
    {
        $quartier->delete();

        Flashy::success('Quartier supprimé avec succès.');
        //session()->flash('success', 'Quartier supprimé avec succès.');

        return redirect(route('quartiers.index'));
    }
}
