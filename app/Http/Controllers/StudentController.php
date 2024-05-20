<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(5); 
        return view('index', compact('students'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'Course' => 'required',
            'phone' => 'required'
        ]);
        
        Student::create($request->all());
        
        return redirect()->route('students.index')->with('success', 'Student has been created successfully.');
    }

    public function show(Student $student)
    {
        return view('show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'Course' => 'required',
            'phone' => 'required'
        ]);
        
        $student->update($request->all());     
        
        return redirect()->route('students.index')->with('success', 'Student has been updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student has been deleted successfully');
    }
}
