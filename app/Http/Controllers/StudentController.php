<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Student/Index', [
            'students' => Student::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Student/Create', [
            'grades' => Grade::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $data = [
            'email' => $params['email'],
            'name' => $params['name'],
            'password' => $params['password'],
        ];

        $user = User::create($data);
        $user->assignRole('student');

        $data = [
            'name' => $params['name'],
            'address' => $params['address'],
            'phone' => $params['phone'],
            'grade_id' => $params['grade_id'],
            'user_id' => $user->id,
        ];

        $student = Student::create($data);

        return redirect()->route('students.index');
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
        $student = $student->with(['user'])->find($student->id);
        return Inertia::render('Student/Edit', ['student' => $student, 'grades' => Grade::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $params = $request->all();


        $data = [
            'name' => $params['name'],
            'address' => $params['address'],
            'phone' => $params['phone'],
            'grade_id' => $params['grade_id'],
        ];

        $student->update($data);

        $data = [
            'email' => $params['email'],
            'name' => $params['name'],
        ];

        $student->user()->update($data);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
