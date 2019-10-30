<?php

namespace App\Http\Controllers\Dashboard;

use App\Lesexamen;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLesexamensRequest;
use App\Http\Requests\UpdateLesexamensRequest;

class LesexamensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.lesexamens.index')->with('lesexamens', Lesexamen::paginate(8));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.lesexamens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLesexamensRequest $request)
    {
        Lesexamen::create([
            'name'=> $request->name
        ]);
        Flashy::success('Examen créé avec succès.');
        //session()->flash('success', 'Examen créé avec succès');
        
        return redirect(route('lesexamens.index'));
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
    public function edit(Lesexamen $lesexamen)
    {
        return view('dashboard.lesexamens.create')->with('lesexamen', $lesexamen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLesexamensRequest $request, Lesexamen $lesexamen)
    {
        
        $lesexamen->update([
            'name'=> $request->name
        ]);

        $lesexamen->save();

        Flashy::success('Examen mis à jour avec succès.');
        
        //session()->flash('success', 'Examen mis à jour avec succès');
        
        return redirect(route('lesexamens.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesexamen $lesexamen)
    {
        $lesexamen->delete();

        Flashy::success('Examen supprimé avec succès.');

        //session()->flash('success', 'Examen supprimé avec succès.');

        return redirect(route('lesexamens.index'));
    }
}
