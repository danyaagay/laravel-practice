<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UpdateClassesRequest;
use App\Http\Requests\StoreClassesRequest;
use App\Models\Classes;

class ClassesController extends Controller
{
    public function index()
    {
        return Classes::get();
    }

    public function show(int $id)
    {
        return Classes::with('students')->findOrFail($id);
    }

    public function store(StoreClassesRequest $request)
    {
        $class = Classes::create($request->validated());
        return $class;
    }

    public function update(UpdateClassesRequest $request, int $id)
    {
        $class = Classes::findOrFail($id);
        $class->update($request->validated());
        return $class;
    }

    public function destroy(int $id)
    {
        $class = Classes::findOrFail($id);
        $students = $class->students()->where('class_id', $id)->update(['class_id' => 0]);
        $class->delete();
    }
}
