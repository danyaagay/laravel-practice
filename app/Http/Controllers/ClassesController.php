<?php

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

    public function show($id)
    {
        return Classes::find($id);
    }

    public function store(StoreClassesRequest $request)
    {
        $class = Classes::create($request->validated());
        return $class;
    }

    public function update(UpdateClassesRequest $request, $id)
    {
        $class = Classes::findOrFail($id);
        $class->update($request->validated());
        return $class;
    }

    public function destroy($id)
    {
        Classes::destroy($id);
        return response(null, 204);
    }
}
