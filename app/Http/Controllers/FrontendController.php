<?php

namespace App\Http\Controllers;

use App\Type;
use App\Ville;
use App\Examen;
use App\Galery;
use App\Rating;
use App\School;
use App\Statut;
use App\Quartier;
use App\Lesexamen;
use Carbon\Carbon;
use App\Fraisinscription;
use App\Charts\ResultChart;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\DB;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\CreateRatingRequest;
use App\Http\Requests\CreateSchoolRequest;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::orderBy('id', 'desc')->get();
        return view('frontend.index')
        ->with('schools', $schools)
        ->with('types', Type::all())
        ->with('statuts', Statut::all())
        ->with('quartiers', Quartier::all())
        ->with('villes', Ville::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        //
    } */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        // Chart pour cepd
        
        $result_cepd = $school->examen->where('exam_name', '=', 'CEDP')->pluck('exam_percentage');
        //return $result;
        $years = $school->examen->pluck('year_exam');
        $years = json_decode($years);
        $years = array_unique($years);
        $years = array_values($years);
        //return $years;
        $exam_cepd = $school->examen->where('exam_name', '=', 'CEDP')->pluck('exam_name');
        $exam_cepd = json_decode($exam_cepd);
        $exam_cepd = array_unique($exam_cepd);
      
        // Chart pour BEPC
        
        $result_bepc = $school->examen->where('exam_name', '=', 'BEPC')->pluck('exam_percentage');
        //return $result;
        $years = $school->examen->pluck('year_exam');
        $years = json_decode($years);
        $years = array_unique($years);
        $years = array_values($years);
        //return $years;
        $exam_bepc = $school->examen->where('exam_name', '=', 'BEPC')->pluck('exam_name');
        $exam_bepc = json_decode($exam_bepc);
        $exam_bepc = array_unique($exam_bepc);

         // Chart pour BAC1
        
         $result_bac1 = $school->examen->where('exam_name', '=', 'BAC I')->pluck('exam_percentage');
         //return $result;
         $years = $school->examen->pluck('year_exam');
         $years = json_decode($years);
         $years = array_unique($years);
         $years = array_values($years);
         //return $years;
         $exam_bac1 = $school->examen->where('exam_name', '=', 'BAC I')->pluck('exam_name');
         $exam_bac1 = json_decode($exam_bac1);
         $exam_bac1 = array_unique($exam_bac1);

          // Chart pour BAC2
        
          $result_bac2 = $school->examen->where('exam_name', '=', 'BAC II')->pluck('exam_percentage');
          //return $result_bac2;
          $years = $school->examen->pluck('year_exam');
          $years = json_decode($years);
          $years = array_unique($years);
          $years = array_values($years);
          //return $years;
          $exam_bac2 = $school->examen->where('exam_name', '=', 'BAC II')->pluck('exam_name');
          $exam_bac2 = json_decode($exam_bac2);
          $exam_bac2 = array_unique($exam_bac2);

           // Chart pour BTS
        
           $result_bts = $school->examen->where('exam_name', '=', 'BTS')->pluck('exam_percentage');
           //return $result_bac2;
           $years = $school->examen->pluck('year_exam');
           $years = json_decode($years);
           $years = array_unique($years);
           $years = array_values($years);
           //return $years;
           $exam_bts = $school->examen->where('exam_name', '=', 'BTS')->pluck('exam_name');
           $exam_bts = json_decode($exam_bts);
           $exam_bts = array_unique($exam_bts);

            // Chart pour LICENCE
        
            $result_licence = $school->examen->where('exam_name', '=', 'LICENCE')->pluck('exam_percentage');
            //return $result_bac2;
            $years = $school->examen->pluck('year_exam');
            $years = json_decode($years);
            $years = array_unique($years);
            $years = array_values($years);
            //return $years;
            $exam_licence = $school->examen->where('exam_name', '=', 'LICENCE')->pluck('exam_name');
            $exam_licence = json_decode($exam_licence);
            $exam_licence = array_unique($exam_licence);


            // Chart pour MASTER
        
            $result_master = $school->examen->where('exam_name', '=', 'MASTER')->pluck('exam_percentage');
            //return $result_bac2;
            $years = $school->examen->pluck('year_exam');
            $years = json_decode($years);
            $years = array_unique($years);
            $years = array_values($years);
            //return $years;
            $exam_master = $school->examen->where('exam_name', '=', 'MASTER')->pluck('exam_name');
            $exam_master = json_decode($exam_master);
            $exam_master = array_unique($exam_master);

            // Chart pour LICENCE
        
            $result_doctorat = $school->examen->where('exam_name', '=', 'DOCTORAT')->pluck('exam_percentage');
            //return $result_bac2;
            $years = $school->examen->pluck('year_exam');
            $years = json_decode($years);
            $years = array_unique($years);
            $years = array_values($years);
            //return $years;
            $exam_doctorat = $school->examen->where('exam_name', '=', 'DOCTORAT')->pluck('exam_name');
            $exam_doctorat = json_decode($exam_doctorat);
            $exam_doctorat = array_unique($exam_doctorat);
       
        $chart = new ResultChart;
        $chart->options([
            'title' => [
                'display' => true,
                'text' => 'Pourcentages (%) des résultats des Examens au cours des années',
                'font_family' =>"'Raleway'",
                'font_size' => '16',
                'color' => '#707070',
            ]
        ]);
        $chart->labels($years);
        // CEPD DATASET
        foreach ($exam_cepd as $cepd) {
            $chart->dataset($cepd, 'line', $result_cepd)->options([
                'borderColor' => '#f8beb8',
                'fill' => false,
                'backgroundColor' => '#f8beb8',
            ]);
        }      
        // BEPC DATASET
        foreach ($exam_bepc as $bepc) {
            $chart->dataset($bepc, 'line', $result_bepc)->options([
                'borderColor' => '#ff0000',
                'fill' => false,
                'backgroundColor' => '#ff0000',
            ]);
        }       
        // BAC1 DATASET
        foreach ($exam_bac1 as $bac1) {
            $chart->dataset($bac1, 'line', $result_bac1)->options([
                'borderColor' => '#5cccb4',
                'fill' => false,
                'backgroundColor' => '#5cccb4',
            ]);
        }       

        // BAC2 DATASET
        foreach ($exam_bac2 as $bac2) {
            $chart->dataset($bac2, 'line', $result_bac2)->options([
                'borderColor' => '#3f95ce',
                'fill' => false,
                'backgroundColor' => '#3f95ce',
            ]);
        }       

        // BTS DATASET
        foreach ($exam_bts as $bts) {
            $chart->dataset($bts, 'line', $result_bts)->options([
                'borderColor' => '#70e1b0',
                'fill' => false,
                'backgroundColor' => '#70e1b0',
            ]);
        }
        
        // LICENCE DATASET
        foreach ($exam_licence as $licence) {
            $chart->dataset($licence, 'line', $result_licence)->options([
                'borderColor' => '#dce372',
                'fill' => false,
                'backgroundColor' => '#dce372',
            ]);
        }

        // MASTER DATASET
        foreach ($exam_master as $master) {
            $chart->dataset($master, 'line', $result_master)->options([
                'borderColor' => '#f1c251',
                'fill' => false,
                'backgroundColor' => '#f1c251',
            ]);
        }      
        
        // DOCTORAT DATASET
        foreach ($exam_doctorat as $doctorat) {
            $chart->dataset($doctorat, 'line', $result_doctorat)->options([
                'borderColor' => '#51eff1',
                'fill' => false,
                'backgroundColor' => '#51eff1',
            ]);
        }       
 
        return view('frontend.details')

         ->with('school', $school)
         ->with('types', Type::all())
         ->with('chart', $chart)
         ->with('ratings', School::paginate(5));

    }

    public function statut(Statut $statut){



        return view('frontend.statuts')
        ->with('statut', $statut)
        ->with('schools', $statut->school()->orderby('id', 'desc')->paginate(6));

    }

    public function type(Type $type){



        return view('frontend.types')
        ->with('type', $type)
        ->with('schools', $type->schools()->orderby('id', 'desc')->paginate(6));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     /**
     * Show contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact(){
        return view('frontend.contact')->with('types', Type::all());
    }

    public function contactstore(ContactRequest $request){

       $maillable =  new ContactMessageCreated($request->name, $request->email, $request->subject, $request->msg);

        Mail::to('yamedekpedzi@gmail.com')->send($maillable);

        Flashy::success('Merci ! Votre message a été envoyé avec succès.');
        
         //session()->flash('success', 'Vous avez ajouté une école avec succès');
 
         return redirect()->back();
    }

     /**
     * Show about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about(){
        return view('frontend.a-propos')
                ->with('types', Type::all())
                ->with('statuts', Statut::all());
    }

    /**
     * Show about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function listecoles(){

        $schoolname = request()->query('query');
        $location = request()->query('location');
        $type = request()->query('type');
        $search = request()->query('search');


        if($schoolname){

            $schools = School::with('types')
                        
                ->where('name', 'LIKE', '%'.$schoolname.'%')
                ->orderBy('id', 'desc')
                ->paginate(10);   
                //return response()->json($schools); 

        }elseif($location){

            $schools = School::with('types')
            
            ->whereHas('ville', function ($query) use ($location) {
                $query->where('name', $location);
            })

            ->orWhereHas('quartier', function ($query) use ($location) {
                $query->where('name', $location);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        }elseif($search){

            $schools = School::with('types')

            ->whereHas('types', function ($query) use ($search) {
                $query->where('name', $search);
            })

            ->orWhereHas('statut', function ($query) use ($search) {
                $query->where('name', $search);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        }elseif($type){

            $schools = School::whereHas('types', function($query) use($type){

                $query->where('type_id', $type); //this refers id field from categories table

                })
                ->orderBy('id', 'desc')
                ->paginate(10);

        }else{
            $schools = School::orderBy('id', 'desc')->paginate(10); 
        }

        return view('frontend.liste-ecoles')
        ->with('statuts', Statut::all())
        ->with('types', Type::all())
        ->with('schools', $schools);      
       
    }

    
    /**
     * CREATE RATING FOR ALL
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function create_rating(CreateRatingRequest $request){

        Rating::create([
            'rating' => $request->rating,
            'rate_name'=> $request->rate_name,
            'rate_mail'=> $request->rate_mail,
            'comment'=> $request->comment,
            'school_id'=> $request->school_id
        ]);
        
        Flashy::success('Avis ajouté avec succès.');

        //session()->flash('success', 'Avis ajouté avec succès');
        
        return redirect()->back();

    }

     /**
     * Searh ville and quartier
     *
     * @return \Illuminate\Http\Response
     */
    public function location(Request $request)
    {
        $search = $request->get('term');
      
        //$results = Quartier::where('name', 'LIKE', '%'. $search. '%')->get();

        $villes = DB::table("villes")
            ->select("name")
            ->where('name', 'LIKE', '%'. $search. '%');
        $quartiers = DB::table("quartiers")
            ->select("name")
            ->unionAll($villes)
            ->where('name', 'LIKE', '%'. $search. '%')
            ->get();
        
        //dd($result);
          return response()->json($quartiers);
    } 

     /**
     * Searh type ou nom
     *
     * @return \Illuminate\Http\Response
     */
    public function schoolname(Request $request)
    {
        $search = $request->get('term');
      
        $results = School::where('name', 'LIKE', '%'. $search. '%')->get();
        
        //dd($result);
          return response()->json($results);
    }
    
    /**
     * Display add school page.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function addschool(){
        
        return view('frontend.add-school')
        ->with('statuts', Statut::all())
        ->with('types', Type::all())
        ->with('villes', Ville::all())
        ->with('quartiers', Quartier::all())
        ->with('lesexamens', Lesexamen::all());
    }

    public function saveschool(CreateSchoolRequest $request){
         // télécharger le cover image
         $cover = $request->cover;
         if($request->hasFile('cover')){
             $cover->store('covers');
         }

         // télécharger le logo image
         $logo = $request->logo;
         if($request->hasFile('logo')){
             $logo->store('logos');
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
         Examen::insert($insert_data);

         // Insert admission fees data 
         
        $niveau_etude = $request->niveau_etude;
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
         Fraisinscription::insert($insert_datafrais); 
         
         // Ajout de type d'école
         if($request->type){
             $school->types()->attach($request->type);
         }  

         Flashy::success('Vous avez ajouté votre école avec succès');
        
         //session()->flash('success', 'Vous avez ajouté une école avec succès');
 
         return redirect( route('schools.index') );
    }
}