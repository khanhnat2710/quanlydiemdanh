<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreteacherRequest;
use App\Http\Requests\UpdateteacherRequest;
use App\Models\admin\teacher;
use Illuminate\Support\Facades\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = teacher::all();
        return view('teacher.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreteacherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateteacherRequest $request, teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(teacher $teacher)
    {
        //
    }
}
