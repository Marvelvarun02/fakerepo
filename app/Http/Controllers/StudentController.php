<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // this function get's the values fron database and store them in $students variable then returns them to index.php
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(10); 

        // compact -->$students = [
       //     'name' => 'xxxxxx',
       //     'age' => 25,
      //     'city' => 'xxxxxx'
    // ];
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
            'email' => 'required|email|unique:students,email',
            'Course' => 'required',
            'phone' => 'required|numeric'
        ]);

        // create methis stores all the data in the student controller by matching the data with the existing column names
        Student::create($request->all());

        // students.index is named rout in web.php
        return redirect()->route('students.index')->with('success', 'Student has been created successfully.');
    }

    
    public function show(Student $student)
    {
        return view('show', compact('student'));
    }

    // public function show(Request $request, $id)
    // {
    //     $student = Student::findOrFail($id);
    //     return view('show', compact('student'));
    // }

    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'Course' => 'required',
            'phone' => 'required|numeric'
        ]);
        
        $student->update($request->all());     
        
        return redirect()->route('students.index')->with('success', 'Student has been updated successfully.');
    }

    
    public function destroy(Student $student)
{
    $student->delete();
    
    return response()->json(['success' => true, 'message' => 'Student deleted successfully.']);
}


}






