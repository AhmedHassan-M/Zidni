<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ContactUs;
use Auth;
use App\Adminnotify;
use App\Count;

class userController extends Controller
{
    public function profiles(Request $request)
    {
    	if($request->profile_photo){
    		$user = User::find(Auth::user()->id);
    		$mainpath = 'image';
	    	if($request->hasFile('photo')) {
	            $file = $request->photo;
	            $filename =  time().$file->getClientOriginalExtension();
	            $file->move($mainpath,$filename);
	            $user->photo = $filename;
	            $user->save();
	        }
	        return redirect('/profile');
    	}else{
	    	$user = User::find($request->id);
	    	$user->first_name = $request->editAccountFristName;
	    	$user->last_name = $request->editAccountLastName;
			$password = $request->editAccountCurrentPassword;
			if(empty($password)){
				$user->save();
			}else{
				if (Auth::attempt(['email' => $user->email, 'password' => $password])){
					$user->password = bcrypt($request->editAccountNewPassword);
				}else{
					return response()->json('failure');
				}
	    	
	    		$user->save();
			}
	    }
    	return response()->json('success');
    }
    public function profiles_email(Request $request)
    {
    		
    		$user = User::find($request->id);
	    	
	    	$password = $request->changeEmailPassword;
	    	if (Auth::attempt(['email' => $user->email, 'password' => $password])){
	    		$user->email = $request->changeEmailNew;
	    		$user->save();
	    		return response()->json('success');
	    	}
    		return response()->json('psw error');
    		
    }
    public function forgetpsw(Request $request)
    {
    	$email = $request->forgetPasswordEmail;
    		
    	$code = rand(100000,1000000);
        $to = $email ;
		$subject = "Reset Your Account Password";
		$txt = 'Here is your confirmation code : '.$code;
		$from= "From: admin@zidni.com";
	
		//mail($to,$subject,$txt,$from);
	
		$userForget = User::where('email',$email)->get();
		if(count($userForget) > 0){
			$userForget[0]->forgetCode = $code;
			$userForget[0]->save();

			return response()->json(1);
		}else{
			return response()->json(0);
		}
		
    }
    public function forgetStep2(Request $request)
    {
    	$code = $request->resetCode;
        $newpass= $request->resetPassword;
    
	
		$userForget = User::where('forgetCode',$code)->get();


		if(count($userForget) > 0){
			//$userForget[0]->forgetCode = $code;
			$userForget[0]->password = bcrypt($newpass);
			$userForget[0]->forgetCode = NULL;
			$userForget[0]->save();
			return response()->json(1);
		}else{
			return response()->json(0);
		}
        
	}
	public function contactDataSave(Request $request){
		$contact = new ContactUs;
		$contact->name = $request->contactusName;
		$contact->email = $request->contactusEmail;
		$contact->message = $request->contactusMessage;
		$contact->save();

		// Notification to Admin
		$text = "New Contact-Us message has been sent by ".$contact->name;
		$notification = new Adminnotify;
		$notification->title = "Contact-Us Message";
		$notification->text = $text;
		$notification->link = "/admin/inbox";
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
}
