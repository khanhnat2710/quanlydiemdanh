<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreclassesRequest;
use App\Http\Requests\UpdateclassesRequest;
use App\Models\admin\classes;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = classes::all();
        return view('classes.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreclassesRequest $request)
    {
        $class_name = $request->class_name;
        $grade = $request->grade;
        $number_of_students = $request->number_of_students;
        $homeroom_teacher_id = $request->homeroom_teacher_id;

        $classes = classes::create([
            'class_name' => $class_name,
            'grade' => $grade,
            'number_of_students' => $number_of_students,
            'homeroom_teacher_id' => $homeroom_teacher_id,
        ]);

        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateclassesRequest $request, classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(classes $classes)
    {
        //
    }
}
