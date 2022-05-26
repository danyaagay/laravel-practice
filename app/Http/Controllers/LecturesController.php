<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLecturesRequest;
use App\Http\Requests\UpdateLecturesRequest;
use App\Models\Lectures;

class LecturesController extends Controller
{
    public function index()
    {
        return Lectures::get();
    }

    public function show(int $id)
    {
        $lecture = Lectures::with('classes')->findOrFail($id);
        $ids = $lecture->classes->pluck('id')->toArray();
        $classes = $lecture->classes()->find($ids);
        $students = [];
        foreach ($classes as $class) {
            $students = array_merge($students, $class->students->toArray());
        }
        return $lecture->toArray()+['students' => $students];
    }

    public function store(StoreLecturesRequest $request)
    {
        $lecture = Lectures::create($request->validated());
        return $lecture;
    }

    public function update(UpdateLecturesRequest $request, int $id)
    {
        $lecture = Lectures::findOrFail($id);
        $lecture->update($request->validated());
        return $lecture;
    }

    public function destroy(int $id)
    {
        Lectures::destroy($id);
    }
}
