<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {
        return Students::get();
    }

    public function show($id)
    {
        $student = Students::with('class')->findOrFail($id);
        $lectures = $student->class()->find($student->class_id)->lectures;
        return $student->toArray() + ['lectures' => $lectures];
    }

    public function store(StoreStudentsRequest $request)
    {
        return Students::create($request->validated());
    }

    public function update(UpdateStudentsRequest $request, $id)
    {
        $student = Students::findOrFail($id);
        $student->update($request->safe()->only(['name', 'class_id']));
        return $student;
    }

    public function destroy($id)
    {
        Students::destroy($id);
    }
}
