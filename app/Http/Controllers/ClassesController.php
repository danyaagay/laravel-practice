<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateClassesRequest;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\StorePlansRequest;
use App\Models\Classes;

class ClassesController extends Controller
{
    public function index()
    {
        return Classes::get();
    }

    public function show($id)
    {
        return Classes::with('students')->findOrFail($id);
    }

    public function showLectures($id)
    {
        return Classes::findOrFail($id)->lectures;
    }

    public function store(StoreClassesRequest $request)
    {
        $class = Classes::create($request->validated());
        return $class;
    }

    public function storePlans(StorePlansRequest $request)
    {
        $validated = $request->validated();
        $class = Classes::findOrFail($validated['class_id']);
        $class->lectures()->attach($validated['lecture_id'], ['planned_at' => $validated['planned_at']]);
    }

    public function update(UpdateClassesRequest $request, $id)
    {
        $class = Classes::findOrFail($id);
        $class->update($request->validated());
        return $class;
    }

    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $students = $class->students()->where('class_id', $id)->update(['class_id' => 0]);
        $class->delete();
    }
}
