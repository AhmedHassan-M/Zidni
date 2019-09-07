<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Specialprogress;
use App\Enrollspecialization;
use App\Masterprogress;
use App\Enrollmaster;
use App\Enroll;

class CheckCertificate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('i');
        $type = $request->route('type');
        if($type == "specialization"){
            $enrolledUser = Enrollspecialization::find($id);
            $user = $enrolledUser->user_id;

            if($user == Auth::user()->id){
                if($enrolledUser->progress == 100){
                    //$returnHTML = view('site.get-certificate.get-certificate')->render();
                    return $next($request);
                }else{
                    $currentURL = $_SERVER['REQUEST_URI'];
                    return redirect('/404');
                }
            }else{
                return redirect('/404');
            }
        }elseif($type == "master-degree"){
            $enrolledUser = Enrollmaster::find($id);
            $user = $enrolledUser->user_id;

            if($user == Auth::user()->id){
                if($enrolledUser->progress == 100){
                    //$returnHTML = view('site.get-certificate.get-certificate')->render();
                    return $next($request);
                }else{
                    return redirect('/404');
                }
            }else{
                return redirect('/404');
            }
        }elseif($type == "course"){
            $enrollCourse = Enroll::find($id);
            $user = $enrollCourse->user_id;

            if($user == Auth::user()->id){
                if($enrollCourse->progress == 100 && $enrollCourse->quiz == 1){
                    //$returnHTML = view('site.get-certificate.get-certificate')->render();
                    return $next($request);
                }else{
                    return redirect('/404');
                }
            }else{
                return redirect('/404');
            }
        }
        
        return redirect('/404');
    }
}
