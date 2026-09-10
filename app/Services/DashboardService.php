<?php

namespace App\Services;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\Teacher;

class DashboardService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getDashboardData()
    {
        
        $students=Student::paginate(5);
        $studentsCount = Student::count();
        $classCounts=Classroom::count();
        $teachersCount=Teacher::count();
        return [
            'teachersCount' => $teachersCount,
            'studentsCount' => $studentsCount,
            'classCount' => $classCounts,
            'students' => $students,
        ];
    }
}
