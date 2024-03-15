<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use App\Http\Requests\PromptRequest;

class PromptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Prompt::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Prompt::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromptRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        $prompts = Prompt::create($validated);

        return $prompts; 
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prompts = Prompt::findOrFail($id);
 
        $prompts->delete();

        return $prompts;
    }
}
