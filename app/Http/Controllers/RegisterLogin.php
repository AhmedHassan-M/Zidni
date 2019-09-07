<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Crypt;
use App\checkuser;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\ContactUs;
use App\Adminnotify;
use App\Count;

class RegisterLogin extends Controller
{
    public function RLogin(Request $request)
	{	
		// $users = User::all();
		// $countusers = count($users);
		if($request->register){
			$olduser = User::where('email',$request->signupEmail)->get();
			if(count($olduser) > 0){
				return response()->json('exist');
			}else{
				$user = new User;
				$fullName = $request->signupName;
				$Names = explode(" ", $fullName);
				if(count($Names) > 0){
					$firstName = $Names[0];
					$user->first_name = $firstName;
				}
				if(count($Names) > 1){
					$lastName = $Names[1];
					$user->last_name = $lastName;
				}
				$user->full_name = $request->signupName;
				
				
				$user->email = $request->signupEmail;
		        $user->password =  bcrypt($request->signupPassword);
		        $user->save();
				Auth::login($user);
				
				// Notification to Admin
				$text = "New Student ".$user->full_name." has joined Zidni Educational Institute";
				$notification = new Adminnotify;
				$notification->title = "Registration";
				$notification->text = $text;
				$notification->link = "/admin/all-users";
				$notification->save();

				$admins = User::where('admin',1)->get();

				foreach($admins as $admin){
					$available = Count::where('user_id',$admin->id)->get();

					if(count($available) == 0){
						$count = new Count;
						$count->user_id = $admin->id;
						$count->number = 1;
						$count->save();
					}else{
						$available[0]->number = $available[0]->number + 1;
						$available[0]->save();
					}
				}

		        return response()->json('true');
			}
		}else if($request->login){ 
			$email = $request->signinEmail;
			$password = $request->signinPassword;

			if(Auth::attempt(['email' => $email, 'password' => $password])){
				if(Auth::user()->admin == 1){
					Auth::logout();
					return response()->json('error');
				}
				return response()->json(Auth::user()->admin);
			}else{
				return response()->json('error');
			}
		}elseif($request->admin_zidni_logan == "606"){

			$email = $request->adminSigninEmail;
			$password = $request->adminSigninPassword;
			if(Auth::attempt(['email' => $email, 'password' => $password])){
				if(Auth::user()->admin == 0){
					Auth::logout();
					return response()->json('error');
				}
				return response()->json(Auth::user()->admin);
			}else{
				return response()->json('error');
			}
		}elseif($request->forget){
			$code = rand(10,100);
	        $emailforget ='khaledadel122@gmail.com';
	        $to = $emailforget ;
			$subject = "إستعادة كلمة المرور";
			$txt = $code;
			$from= "From: admin@gawziny.com";
		
			//mail($to,$subject,$txt,$from);
		
			// $userForget = User::where('email',$emailforget)->get();
			// if(count($userForget) > 0){
			// 	$userForget[0]->forgetCode = $code;
			// 	$userForget[0]->save();
			// }
			return response()->json($code);
		}
		elseif ($request->contact) {
			$contact = new ContactUs;
			$contact->name = $request->name;
			$contact->mobile = $request->mobile;
			$contact->email = $request->email;
			$contact->msg = $request->message;
			$contact->subject = $request->subject;
			$contact->save();

			// Notification to Admin
			$text = "New Contact-Us message has been sent by ".$contact->name;
			$notification = new Adminnotify;
			$notification->text = $text;
			$notification->link = "/admin/inbox";
			$notification->save();

			return response()->json('true');
		}
	}
}
