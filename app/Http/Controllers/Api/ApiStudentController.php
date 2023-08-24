<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class ApiStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $students = Student::create($request->all());
        return new StudentResource($students);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Student::find($id);
        if ($students) {
            return new StudentResource($students);
        } else {
            return response()->json(['message' => 'Student not found!'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $students = Student::find($id);
        if ($students) {
            $students->update($request->all());
            return new StudentResource($students);
        } else {
            return response()->json(['message' => 'Student not found!'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Student::find($id);
        if ($students) {
            $students->delete();
            return response()->json(['message' => 'Student deleted successfully!'], 200);
        } else {
            return response()->json(['message' => 'Student not found!'], 404);
        }
    }
}
