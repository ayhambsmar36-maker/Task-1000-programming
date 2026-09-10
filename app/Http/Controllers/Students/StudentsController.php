<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\Students\CreateStudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Services\Student\StudentService;
use App\Services\Classroom\ClassroomService;

class StudentsController extends Controller
{
       public function __construct(private StudentService $service,private ClassroomService $classroomService)
    {
        //
    }
    public function index()
    {
        $students = $this->service->getAllStudents();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = $this->classroomService->getClassroomData(request());
        return view('students.students-create',compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStudentRequest $request)
    {
        $this->service->createStudent($request->validated());
        return redirect()->route('students.index')->with('messeage', 'تم إضافة الطالب بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.student', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.students-edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
     
        $this->service->updateStudent($student, $request->validated());
        return redirect()->route('students.index')->with('messeage', 'تم تحديث بيانات الطالب بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $this->service->deleteStudent($student);
        return redirect()->route('students.index')->with('success', 'تم حذف الطالب بنجاح.');
    }
}
