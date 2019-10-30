<?php

namespace App\Http\Controllers\Dashboard;

use App\Type;
use App\Ville;
use App\Examen;
use App\Galery;
use App\School;
use App\Statut;
use App\Quartier;
use App\Lesexamen;
use App\Fraisinscription;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddSchoolRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateSchoolRequest;



class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
       /*  $schools = School::all();
        
        return view('dashboard/schools.index')->with('schools', $schools); */

        $query = School::orderBy('id','DESC')->with('user');

        if(!Auth::user()->isAdmin()){
             $query=$query->where('user_id', Auth::user()->id);
         }

       $schools = $query->paginate(5);

       return view('dashboard/schools.index',compact('schools'))
           ->with('id', ($request->input('page', 1) - 1) * 5);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/schools.create')
        ->with('statuts', Statut::all())
        ->with('types', Type::all())
        ->with('villes', Ville::all())
        ->with('quartiers', Quartier::all())
        ->with('lesexamens', Lesexamen::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSchoolRequest $request)
    {   
       
        // télécharger le cover image
        $cover = null;      
        if($request->hasFile('cover')){
            $cover = $request->cover->store('covers');
        }
        // télécharger le logo image
        $logo = null;
        if($request->hasFile('logo')){
            $logo = $request->logo->store('logos');
        }

        $school = School::create([
            'name' => $request->name,
            'statut_id' => $request->statut_id,
            'date_creation' => $request->date_creation,
            'description' => $request->description,
            'logo' => $logo,
            'cover' => $cover,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'ville_id' => $request->ville_id,
            'quartier_id' => $request->quartier_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'video_url' => $request->video_url,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'scholarite_info' => $request->scholarite_info,
            'avantage_sup' => $request->avantage_sup,
            'resultat_examen' => $request->resultat_examen,
            'user_id' => auth()->user()->id
         ]);


      // update each galerie image
      if($request->hasFile('galeries')){
            $galeries = $request->galeries;
        foreach ($galeries as $galerie) {
            $image = $galerie->store('galeries');               
            Galery::create([
                'images' => $image,
                'school_id' => $school->id
            ]);
            }       
        }

        // Insert each result examen data 
       /* 
        $exam_name = $request->exam_name;
        $year_exam = $request->year_exam;
        $exam_percentage = $request->exam_percentage;
        
        for($count = 0; $count < count($exam_name); $count++)
        {
        $data = array(
            'exam_name' => $exam_name[$count],
            'year_exam'  => $year_exam[$count],
            'exam_percentage'  => $exam_percentage[$count],
            'school_id' => $school->id
        );
        $insert_data[] = $data; 
        }
        Examen::insert($insert_data); */

        // Insert admission fees data 
        
    /*    $niveau_etude = $request->niveau_etude;
        $frais = $request->frais;
        
        for($i = 0; $i < count($niveau_etude); $i++)
        {
        $data_frais = array(
            'niveau_etude' => $niveau_etude[$i],
            'frais'  => $frais[$i],
            'school_id' => $school->id
        );
        $insert_datafrais[] = $data_frais; 
        }
        Fraisinscription::insert($insert_datafrais);  */
        
        // Ajout de type d'école
        if($request->type){
            $school->types()->attach($request->type);
        }

        Flashy::success('Vous avez ajouté une école avec succès');
        
        //session()->flash('success', 'Vous avez ajouté une école avec succès');

        return redirect( route('schools.index') );
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
    public function edit(School $school)
    {

        return view('dashboard.schools.create')
        ->with('school', $school)
        ->with('statuts', Statut::all())
        ->with('types', Type::all())
        ->with('villes', Ville::all())
        ->with('quartiers', Quartier::all())
        ->with('examens', Examen::all())
        ->with('lesexamens', Lesexamen::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $data = $request->only(['name','statut_id','date_creation','description','email','phone','website','ville_id','quartier_id','latitude','longitude','video_url','facebook','twitter','linkedin','scholarite_info','avantage_sup','resultat_examen',]);

        /*  if ($school->slug != $request->slug) {
            $school->slug = $slug->createSlug($request->slug, $id);
           } */

        if($request->hasFile('cover')){
            // télécharger le cover image
            $cover = $request->cover->store('covers');
            
            // delete old one

            $school->deleteCover();

            $data['cover'] = $cover;
        }

        if($request->hasFile('logo')){

              // télécharger le logo image
            $logo = $request->logo->store('logos');

            // delete old one

            $school->deleteLogo();

            $data['logo'] = $logo;
         }   

        // update each galerie image
        if($request->hasFile('galeries')){
            $galeries = $request->galeries;
            foreach ($galeries as $galerie) {
            $image = $galerie->store('galeries');               
            Galery::create([
                'images' => $image,
                'school_id' => $school->id
            ]);
            }       
        }
        
                 
        // Ajout de type d'école
        if($request->type){
            $school->types()->sync($request->type);
        }
        
        $school->update($data);

        Flashy::success('Vous avez ajouté une école avec succès');
        //session()->flash('success', 'Vous avez ajouté une école avec succès');

         return redirect( route('schools.index') );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lug)
    {
        $school = School::withTrashed()->where('slug', $lug)->firstOrFail();

        if ($school->trashed()) {

            $school->deleteLogo();

            $school->deleteCover();

            $school->forceDelete();

            Flashy::success('École supprimée définitivement avec succès.');
            //session()->flash('success', 'École supprimée définitivement avec succès.');

        } else {

            $school->delete();

            Flashy::success('École supprimée avec succès');
            //session()->flash('success', 'École supprimée avec succès.');
        }

      

        return redirect(route('schools.index'));
    }

    /**
     * Afficher la liste de toutes les écoles mises à la corbeille.
     *
     * @return \Illuminate\Http\Response
     */

    public function trashed()
    {
        $trashed = School::onlyTrashed()->paginate(8);

        return view('dashboard/schools.index')->withSchools($trashed);
    }

    public function restore($slug)
    {
        $school = School::withTrashed()->where('slug', $slug)->firstOrFail();

        $school->restore();

        session()->flash('Success', 'École restorée avec succès');

        return redirect()->back();
    }
}
