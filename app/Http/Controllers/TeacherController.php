<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Teacher/Index', [
            'teachers' => Teacher::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Teacher/Create', [
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
        $user->assignRole('teacher');

        $data = [
            'name' => $params['name'],
            'address' => $params['address'],
            'phone' => $params['phone'],
            'user_id' => $user->id,
        ];

        $Teacher = Teacher::create($data);

        return redirect()->route('teachers.index');
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
    public function edit(Teacher $Teacher)
    {
        $Teacher = $Teacher->with(['user'])->find($Teacher->id);
        return Inertia::render('Teacher/Edit', ['Teacher' => $Teacher, 'grades' => Grade::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $Teacher)
    {
        $params = $request->all();


        $data = [
            'name' => $params['name'],
            'address' => $params['address'],
            'phone' => $params['phone'],
        ];

        $Teacher->update($data);

        $data = [
            'email' => $params['email'],
            'name' => $params['name'],
        ];

        $Teacher->user()->update($data);

        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
