<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    // List student
    public function listStudent(Request $request)
    {
        $title = 'Student List';
        $students = Student::all();
        return view('student.index', compact('title', 'students'));
    }

    // Add student
    public function addStudent(StudentRequest $request)
    {
        $title = 'Add Student';
        if ($request->isMethod('POST')) {
            $students = new Student();
            $data = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = uploadFile('img', $request->file('image'));
            }
            $students->fill($data)->save();
            if ($students->save()) {
                return redirect()->route('list_student');
            }
        }
        return view('student.add', compact('title'));
    }

    // Edit student
    public function editStudent(StudentRequest $request, $id)
    {
        $title = 'Update Student';
        $details = Student::find($id);
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $deleteImage = Storage::delete('/public/' . $details->image);
                if ($deleteImage) {
                    $data['image'] = uploadFile('img', $request->file('image'));
                }
            }
            $update = Student::where('id', $id)->update($data);
            if ($update) {
                return redirect()->route('list_student');
            }
        }
        return view('student.edit', compact('title', 'details'));
    }

    // Delete student
    public function deleteStudent($id)
    {
        Student::where('id', $id)->delete();
        return redirect()->route('list_student');
    }
}
