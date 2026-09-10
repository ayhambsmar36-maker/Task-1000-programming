<?php

namespace App\Services\Student;

use App\Models\Student;

class StudentService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getAllStudents()
    {
        $students=Student::query();
        if(request()->has('classroom_id')){
            $students=$students->where('classroom_id',request()->classroom_id);
        }
        if(request()->has('name')){
            $students=$students->where('name','like','%'.request()->name.'%');
        }
        return $students->get();
    }
    public function createStudent(array $data)
    {
    
        return Student::create($data);
    }
    public function updateStudent(Student $student, array $data)
    {
  
     $student= $student->update([
            "name"=>$data["name"]?? $student->name,
            "email"=>$data["email"]?? $student->email,
            "phone_number"=>$data["phone_number"],
            "birth_date"=>$data["birth_date"],
            "classroom_id"=>$data["classroom_id"]?? $student->classroom_id
        ]);
        return $student ;
    }
    public function deleteStudent(Student $student)
    {
        return $student->delete();
    }
}
