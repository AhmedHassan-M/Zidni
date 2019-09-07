<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\University\Subject;
use App\University\Rating;

class manageSubject extends Controller
{
    public function createSubject(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'courseName' => 'unique:subjects,name',
        ]);

        if($validator->fails()){
            return redirect()->back()->with('failure' , 'Course name already used');
        }else{
            $name = $request->courseName;
            $description = $request->description;
            $price = $request->price;

            $subject = new Subject;
            $subject->name = $name;
            $subject->description = $description;
            $subject->price = $price;
            $subject->save();

            return redirect('/admin/university/all-courses')->with('success' , 'Course '.$subject->name.' has been created successfully');
        }
    }

    public function allSubjects() {
        $subjects = Subject::latest()->get();
        return view('admin-university.courses.all-courses')->withSubjects($subjects);
    
    }

    public function deleteSubject(Request $request)
    {
        $id = $request->id;

        $subject = Subject::find($id);
        $subject->delete();

        return response()->json('success');
    }

    public function allRatings() {
        $ratings = Rating::whereHas('user')->whereHas('subject')->latest()->get();
        return view('admin-university.rating.all-rating')->withRatings($ratings);
    }
}
