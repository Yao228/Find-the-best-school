<?php

namespace App\Http\Controllers\Dashboard;

use App\Fraisinscription;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFraisinscriptionRequest;
use App\Http\Requests\UpdateFraisinscriptionRequest;

class FraisinscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DB::table('schools')
        ->leftJoin('fraisinscriptions', 'schools.id', '=', 'fraisinscriptions.school_id');
        if(!Auth::user()->isAdmin()){
            $query=$query->where('user_id', Auth::user()->id);
        }
        
        $schools = $query->paginate(8);

            return view('dashboard.fraisinscriptions.index')->with('schools' ,$schools);

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

        return view('dashboard.fraisinscriptions.create')
        ->with('schools' ,$schools);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFraisinscriptionRequest $request)
    {
         // Insert each result examen data 
         $niveau_etude = $request->niveau_etude;
         $frais = $request->frais;
         $school_id = $request->school_id;
         
         for($i = 0; $i < count($niveau_etude); $i++)
         {
         $data_frais = array(
             'niveau_etude' => $niveau_etude[$i],
             'frais'  => $frais[$i],
             'school_id' => $school_id[$i]
         );
         $insert_datafrais[] = $data_frais; 
         }
         Fraisinscription::insert($insert_datafrais);

         Flashy::success('Frais ajouté avec succès.');
         //session()->flash('success', 'Frais ajouté avec succès');
        
        return redirect(route('fraisinscriptions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fraisinscription $fraisinscription)
    {
        return view('dashboard.fraisinscriptions.edit')
        ->with('fraisinscription', $fraisinscription);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFraisinscriptionRequest $request, Fraisinscription $fraisinscription)
    {
        $fraisinscription->update([
            'niveau_etude'=> $request->niveau_etude,
            'frais'=> $request->frais,
        ]);

        $fraisinscription->save();
        
        Flashy::success('Frais modifié avec succès.');
        //session()->flash('success', 'Frais modifié avec succès');
        
        return redirect(route('fraisinscriptions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fraisinscription $fraisinscription)
    {
        $fraisinscription->delete();

        Flashy::success('Frais supprimé avec succès.');
        //session()->flash('success', 'Frais supprimé avec succès.');

        return redirect(route('fraisinscriptions.index'));
    }
}
