<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Grade/Index', [
            'grades' => Grade::get()
        ]);
    }

    /**
     * Show the form for creating a new Grade.
     */
    public function create()
    {
        return Inertia::render('Grade/Create');
    }

    /**
     * Show the form for creating a new Grade.
     */
    public function store(StoreGradeRequest $request)
    {
        $params = $request->all();
        $data = [
            'title' => $params['title'],
        ];

        Grade::create($data);

        return redirect()->route('grades.index');
    }


    /**
     * Show the Grade details
     */
    public function show(Grade $Grade)
    {
        return Inertia::render(
            'Grade/View',
            [
                'Grade' => $Grade
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $Grade)
    {
        return Inertia::render(
            'Grade/Edit',
            [
                'Grade' => $Grade
            ]
        );
    }

    /**
     * Update the Grade
     */
    public function update(UpdateGradeRequest $request, Grade $Grade)
    {
        $params = $request->all();
        $data = [
            'title' => $params['title'],
        ];
        $Grade->update($data);
        return redirect()->route('grades.index');
    }

    /**
     * Delete Grade
     */
    public function delete(Grade $Grade)
    {
        $Grade->delete();
        return redirect()->back();
    }
}
