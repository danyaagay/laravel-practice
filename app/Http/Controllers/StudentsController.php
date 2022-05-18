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
        return Students::find($id);
    }

    public function store(StoreStudentsRequest $request)
    {
        $student = Students::create($request->validated());
        return $student;
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
        //$student = Students::findOrFail($id);
        //$student->delete();
        return response(null, 204);
    }
}
