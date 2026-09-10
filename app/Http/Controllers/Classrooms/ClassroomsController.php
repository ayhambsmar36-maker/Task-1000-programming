<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Classrooms\CreateClassRequest;
use App\Http\Requests\Classrooms\UpdtaeClassRequest;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Services\Classroom\ClassroomService;
class ClassroomsController extends Controller
{
       public function __construct(private ClassroomService $service)
    {
        //
    }
 
    public function index()
    {
        $classrooms = $this->service->getClassroomData(request());
        return view('classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classrooms.classrooms-create')->with('messeage', 'تم اضافة صف دراسي جديد');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClassRequest $request)
    {
       
        $classroom = $this->service->createClassroom($request->validated());
        return redirect()->route('classrooms.index')->with('messeage', 'تم اضافة صف دراسي جديد بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        return view('classrooms.classroom', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    { 
        
        return view('classrooms.classrooms-edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdtaeClassRequest $request, Classroom $classroom)
    {
        $this->service->updateClassroom($classroom, $request->validated());
        return redirect()->route('classrooms.index')->with('messeage', 'تم تحديث بيانات الصف دراسي بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $this->service->deleteClassroom($classroom);
        return redirect()->route('classrooms.index')->with('messeage', 'تم حذف الصف دراسي بنجاح.');
    }
}
