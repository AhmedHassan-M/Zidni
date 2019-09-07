<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Count;
use App\Adminnotify;

class notificationsController extends Controller
{
    public function resetAdminNotifications(Request $request)
    {
        if(Auth::check()){
            $count = Count::where('user_id',Auth::user()->id)->first();
            if(!empty($count)){
                $count->number = 0;
                $count->save();

                return response()->json(0);
            }
        }
        //return response()->json();
    }
    public function fetchNewNotifications(Request $request)
    {
        if(Auth::check()){
            $new = Adminnotify::latest()->get();

            $count = Count::where('user_id',Auth::user()->id)->first();
            if(!empty($count)){
                $i = $count->number;
                if($i > 0){
                    return response()->json([$i,$new]);
                }
                return response()->json([0,0]);
            }
        }
    }
}
