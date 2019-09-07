<?php

namespace App\Http\Controllers\University;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\University\Field;
use App\University\Specyear;
use App\University\Subject;
use App\University\Level;

class manageSpecialization extends Controller
{
    public function addSpecialization() {

        $subjects = Subject::all();
        return view('admin-university.specialization.add-specialization')->withSubjects($subjects);
    
    }

    public function createSpecialization(Request $request)
    {
        $name = $request->specializationName;
        $description = $request->specializationDescription;
        
        $field = new Field;
        $field->name = $name;
        $field->description = $description;
        $field->save();

        for($i = 1 ; $request->has('specializationCourses_'.$i) ; $i++){
            $levelKey = 'specializationCourses_'.$i;
            $subjects = $request->$levelKey;

            $newLvl = new Level;
            $newLvl->level = $i;
            // $newLvl->subject_id = $subject_id;
            $newLvl->field_id = $field->id;
            $newLvl->save();
                
            $newLvl->subjects()->attach($subjects);
            
        }

        return redirect('/admin/university/all-specialization')->with('success' , 'Specialization '.$field->name.' has been created successfully');
    }

    public function allSpecializations() {
        $fields = Field::latest()->get();
        return view('admin-university.specialization.all-specialization')->withFields($fields);
    
    }

    public function deleteSpecialization(Request $request)
    {
        $id = $request->id;
        $field = Field::find($id);
        $field->delete();

        $levels = $field->level;
        foreach($levels as $level){
            $level->delete();
            $level->subjects()->detach();
        }
        return response()->json('success');
    }

    public function editSpecialization($id)
    {
        $field = Field::find($id);
        $subjects = Subject::all();
        return view('admin-university.specialization.edit-specialization')->withField($field)->withSubjects($subjects);
    }

    public function updateSpecialization(Request $request , $id)
    {
        $name = $request->specializationName;
        $description = $request->specializationDescription;
        
        $field = Field::find($id);
        $field->name = $name;
        $field->description = $description;
        $field->save();

        for($i = 1 ; $request->has('specializationCourses_'.$i) ; $i++){

            $levels = $field->level;

            $levelKey = 'specializationCourses_'.$i;
            $googleDriveKey = 'specializationDrive_'.$i;
            $youtubeListKey = 'specializationYoutube_'.$i;

            $subjects = $request->$levelKey;

            if($i <= count($levels)){
                $levels[$i - 1]->level = $i;
                // $newLvl->subject_id = $subject_id;
                $levels[$i - 1]->field_id = $field->id;
                $levels[$i - 1]->google_drive = $request->$googleDriveKey;
                $levels[$i - 1]->youtube_playlist = $request->$youtubeListKey;
                $levels[$i - 1]->save();
                    
                $levels[$i - 1]->subjects()->sync($subjects);
            }else{
                $newLvl = new Level;
                $newLvl->level = $i;
                // $newLvl->subject_id = $subject_id;
                $newLvl->field_id = $field->id;
                $newLvl->google_drive = $request->$googleDriveKey;
                $newLvl->youtube_playlist = $request->$youtubeListKey;
                $newLvl->save();
                    
                $newLvl->subjects()->attach($subjects);
            }
            
        }

        return redirect('/admin/university/all-specialization')->with('success' , 'Specialization '.$field->name.' has been updated successfully');
    }
}
