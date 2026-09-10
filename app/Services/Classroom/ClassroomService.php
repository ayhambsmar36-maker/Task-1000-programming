<?php

namespace App\Services\Classroom;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getClassroomData(Request $request)
    {
        $classes = Classroom::query();
        if ($request->has('name')) {
            $classes->where('name', 'like', '%'.$request->name.'%');
        }
        if ($request->has('capacity')) {
            $classes->where('capacity', $request->capacity);
        }

        return $classes->get();

    }

    public function createClassroom(array $data)
    {
        return $classroom = Classroom::create($data);

    }

    public function updateClassroom(Classroom $classroom, array $data)
    {
        $classroom->update([
            "name"=>$data["name"]?? $classroom->name,
            "capacity"=>$data["capacity"],
            "description"=>$data["description"]
            
        ]);

        return $classroom;
    }

    public function deleteClassroom(Classroom $classroom)
    {
        return $classroom->delete();
    }
}
