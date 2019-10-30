<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SocialAuthAccountService;

class socialAuthController extends Controller
{
    /**
   * Create a redirect method to google api.
   *
   * @return void
   */
    
   public function redirect($service){
       return Socialite::driver($service)->redirect();
   }
   /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */
    public function callback($service)
    {
        $userSocial =   Socialite::driver($service)->stateless()->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
        if($users){
            Auth::login($users);
            return redirect('/dashboard');
        }else{
        $user = User::create([
            'name'          => $userSocial->getName(),
            'email'         => $userSocial->getEmail(),
            'password'      => md5(rand(1,10000)),
            'provider_id'   => $userSocial->getId(),
            'provider'      => $service,
        ]);
            return redirect()->route('dashboard');
        }
    } 


}
