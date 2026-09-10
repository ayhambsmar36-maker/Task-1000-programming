<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teachers\CreateTeacherRequest;
use App\Services\Teacher\TeacherService;
use App\Http\Requests\Teachers\StoreTeachersRequest;
use App\Http\Requests\Teachers\UpdateTeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Services\Classroom\ClassroomService;

class TeachersController extends Controller
{
       public function __construct(private TeacherService $service,private ClassroomService $classroomService)
    {
        //
    }
    public function index()
    {
        $teachers = $this->service->getAllTeachers();
       
        return view('teachers.index', compact('teachers',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $classrooms=$this->classroomService->getClassroomData(request());
        return view('teachers.teachers-create',compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTeacherRequest $request)
    {
        $this->service->createTeacher($request->validated());
        return redirect()->route('teachers.index')->with('messeage', 'تم إضافة المعلم بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.teacher', compact('teacher'));    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $classrooms=$this->classroomService->getClassroomData(request());
        return view('teachers.teachers-edit', compact('teacher','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $this->service->updateTeacher($teacher, $request->validated());
        return redirect()->route('teachers.index')->with('messeage', 'تم تحديث بيانات المعلم بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
         $this->service->destroyTeacher($teacher);
        return redirect()->route('teachers.index')->with('messeage', 'تم حذف المعلم بنجاح.');
    }
}
