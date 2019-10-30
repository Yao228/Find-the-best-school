<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;

class UsersController extends Controller
{
    public function index(){

        return view('dashboard.users.index')->with('users', User::paginate(8));
        
    }

    public function edit(){
        
        return view('dashboard.users.edit-profile')->with('user', auth()->user());
        
    }

    public function update(UpdateProfileRequest $request){
        
        $user = auth()->user();

        $user->update([
            
            'name'=> $request->name,
            'about'=> $request->about

        ]);

        $user->save();
        Flashy::success('Profile modifier avec succès');
        //session()->flash('success', 'Profile modifier avec succès');
        
        return redirect()->back();
        
    }

    public function makeAdmin(User $user){
        
        $user->role = 'admin';

        $user->save();

        Flashy::success('Utilisateur changé en administrateur avec succès');
        //session()->flash('success','Utilisateur changé en administrateur avec succès');

        return redirect(route('users.index'));
    }
}
