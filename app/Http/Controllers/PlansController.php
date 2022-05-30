<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePlansRequest;
use App\Models\Plans;

class PlansController extends Controller
{
    public function index()
    {
        return Plans::get();
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
