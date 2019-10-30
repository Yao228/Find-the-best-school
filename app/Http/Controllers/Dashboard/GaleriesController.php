<?php

namespace App\Http\Controllers\Dashboard;

use App\Galery;
use App\School;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateGaleriesRequest;

class GaleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DB::table('schools')
        ->leftJoin('galeries', 'schools.id', '=', 'galeries.school_id');
        if(!Auth::user()->isAdmin()){
            $query=$query->where('user_id', Auth::user()->id);
        }
        
        $schools = $query->paginate(8);

        //$schools = School::with('galeries')->orderBy('created_at', 'desc')->get();
       
       return view('dashboard.galeries.index')->with('schools' ,$schools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = DB::table('users')
        ->join('schools', 'users.id', '=', 'schools.user_id');
        
        if(!Auth::user()->isAdmin()){
            $query=$query->where('user_id', Auth::user()->id);
        }
        
        $schools = $query->get();

        return view('dashboard.galeries.create')
        ->with('schools' ,$schools); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGaleriesRequest $request)
    {
        if($request->hasFile('galeries')){

            $galeries = $request->galeries;

            $school_id = $request->school_id;

            foreach ($galeries as $galerie) {

                $image = $galerie->store('galeries');

                Galery::create([
                    'images' => $image,
                    'school_id' =>  $school_id
                ]);

            }       
        Flashy::success('Photo ajoutée avec succès.');
        //session()->flash('success', 'Photo ajoutée avec succès');

        return redirect( route('galeries.index') );
        }     
        
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
    public function edit(Galery $galery)
    {   
        return view('dashboard.galeries.edit')
        ->with('galerie', $galery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galery $galery)
    {
        
       /*  $galery = Galery::findOrFail($request->id);
            
        $galery->save();
        
        session()->flash('success', 'Photo changée avec succès');
        
        return redirect(route('galeries.index')); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Galery::findOrFail($id);

        $image->delete();

        Flashy::success('Image supprimée avec succès.');
        //session()->flash('success', 'Image supprimée avec succès.');

        return redirect(route('galeries.index'));
    }
}
