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

    public function show($id)
    {
        return Lectures::find($id);
    }

    public function store(StoreLecturesRequest $request)
    {
        $lecture = Lectures::create($request->validated());
        return $lecture;
    }

    public function update(UpdateLecturesRequest $request, $id)
    {
        $lecture = Lectures::findOrFail($id);
        $lecture->update($request->validated());
        return $lecture;
    }

    public function destroy($id)
    {
        Lectures::destroy($id);
        return response(null, 204);
    }
}
