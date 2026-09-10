<?php

namespace App\Services\Teacher;
use App\Models\Teacher;

class TeacherService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getAllTeachers()
    {
            $teachers=Teacher::query();
            if(request()->has("name")){
                $teachers=$teachers->where("name","like","%".request()->name."%");
            }
        if(request()->has("classroom_id")){
            $teachers=$teachers->where("classroom_id",request()->classroom_id);
        }
        return $teachers->with('classroom')->get();
    }
    public function createTeacher(array $data)
    {
        
        return Teacher::create($data);
    }
    public function updateTeacher(Teacher $teacher, array $data)
    {
        $teacher->update([
            "name"=>$data["name"]?? $teacher->name,
            "email"=>$data["email"]?? $teacher->email,
            "phone_number"=>$data["phone_number"],
            "specialization"=>$data["specialization"],
            "classroom_id"=>$data["classroom_id"]?? $teacher->classroom_id
        ]);
        return $teacher ;
    }
    public function destroyTeacher(Teacher $teacher)
    {
        return $teacher->delete();
    }
}
