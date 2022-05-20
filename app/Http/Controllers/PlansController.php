<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlansRequest;
use App\Http\Requests\UpdatePlansRequest;
use App\Models\Plans;
use App\Models\Classes;

class PlansController extends Controller
{
    public function index()
    {
        return Plans::get();
    }
    
    public function show($id)
    {
        return Classes::findOrFail($id)->lectures;
    }

    public function store(StorePlansRequest $request)
    {
        $plan = Plans::create($request->validated());
        return $plan;
    }

    public function update(UpdatePlansRequest $request, $id)
    {
        $plan = Plans::findOrFail($id);
        $plan->update($request->validated());
        return $plan;
    }

    public function destroy($id)
    {
        Plans::destroy($id);
    }
}