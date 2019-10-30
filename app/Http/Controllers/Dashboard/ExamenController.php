<?php

namespace App\Http\Controllers\Dashboard;

use App\Examen;
use App\School;
use App\Lesexamen;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateExamenRequest;
use App\Http\Requests\UpdateExamenRequest;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = DB::table('schools')
            ->leftJoin('examens', 'schools.id', '=', 'examens.school_id');
            if(!Auth::user()->isAdmin()){
                $query=$query->where('user_id', Auth::user()->id);
            }
            
            $schools = $query->paginate(8);

            return view('dashboard.examens.index')->with('schools' ,$schools);

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

        return view('dashboard.examens.create')
        ->with('schools' ,$schools)
        ->with('lesexamens', Lesexamen::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExamenRequest $request)
    {
         // Insert each result examen data 
          
         $exam_name = $request->exam_name;
         $year_exam = $request->year_exam;
         $exam_percentage = $request->exam_percentage;
         $school_id = $request->school_id;
         
         for($count = 0; $count < count($exam_name); $count++)
         {
         $data = array(
             'exam_name' => $exam_name[$count],
             'year_exam'  => $year_exam[$count],
             'exam_percentage'  => $exam_percentage[$count],
             'school_id' =>  $school_id[$count],
         );
         $insert_data[] = $data; 
         }
         Examen::insert($insert_data);

        Flashy::success('Résultat créé avec succès.');

        //session()->flash('success', 'Résultat créé avec succès');
        
        return redirect(route('examens.index'));
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
    public function edit(Examen $examen)
    {
        return view('dashboard.examens.edit')
        ->with('examen' ,$examen)
        ->with('schools', School::all())
        ->with('lesexamens', Lesexamen::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamenRequest $request, Examen $examen)
    {
        $examen->update([
            'exam_name'=> $request->exam_name,
            'year_exam'=> $request->year_exam,
            'exam_percentage'=> $request->exam_percentage,
            'school_id' => $request->school_id,
        ]);

        $examen->save();
        
        Flashy::success('Résultat modifié avec succès.');
        //session()->flash('success', 'Résultat modifié avec succès');
        
        return redirect(route('examens.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examen)
    {
        $examen->delete();

        Flashy::success('Résultat supprimé avec succès.');
        //session()->flash('success', 'Résultat supprimé avec succès.');

        return redirect(route('examens.index'));
    }
}
