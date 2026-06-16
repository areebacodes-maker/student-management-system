<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Batch;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $students = Student::with('batch')->get();

    return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $batches = Batch::all();

    return view('students.create', compact('batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required',
        'city' => 'required',
        'batch_id' => 'required|exists:batches,id',
    ]);

    Student::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'city' => $request->city,
        'batch_id' => $request->batch_id,
    ]);

    // return redirect('/students/create');

    return redirect()
    ->route('students.index')
    ->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Student $student)
{
    $batches = Batch::all();

    return view('students.edit', compact('student', 'batches'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
{
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'phone' => 'required',
        'city' => 'required',
        'batch_id' => 'required|exists:batches,id',
    ]);

    $student->update($request->all());

    return redirect('/students')
        ->with('success', 'Student updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
{
    $student->delete();

    return redirect('/students')
        ->with('success', 'Student deleted successfully.');
}
}
