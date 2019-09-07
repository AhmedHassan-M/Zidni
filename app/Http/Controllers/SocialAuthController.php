<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;

class SocialAuthController extends Controller
{
    public function redirect($service){
        return Socialite::driver ( $service )->redirect ();
    }
    public function callback($service) {
        $user = Socialite::with ( $service )->user ();

        // OAuth Two Providers
        $token = $user->token;

        // All Providers
        $id = $user->getId();
        $nickName = $user->getNickname();
        $name = $user->getName();
        $email = $user->getEmail();
        $picture = $user->getAvatar();

        if($email == null || $id == null){
			       
            return redirect('/');
    
        }else{
            $uservalid = User::where('social_id',$id)->get();
            if(count($uservalid)!==0){
                Auth::login($uservalid[0],true);
                return redirect('/');
            }else{
                $password = rand(10000,100000);
                $newuser = new User;
                $newuser->social_id = $id;
                $newuser->full_name = $name;
                $Names = explode(" ", $name);
                if(count($Names) > 0){
					$firstName = $Names[0];
					$newuser->first_name = $firstName;
				}
				if(count($Names) > 1){
					$lastName = $Names[1];
					$newuser->last_name = $lastName;
				}
                $newuser->email = $email;
                $newuser->remember_token = $token;
                $newuser->social_photo = $picture;
                $newuser->password = bcrypt($password);
                $remember = $token;
                $newuser->save();
                Auth::login($newuser,true);
                return redirect('/');
            }
        }
    }
}
