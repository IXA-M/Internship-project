<?php

namespace App\Http\Controllers\api;

use App\Models\Postion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobApiController extends Controller
{
    public function jobs()
    {
        $jobs = Postion::with('employer.user')->simplePaginate(3);

        return response()->json($jobs);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'salary' => ['required', 'string', 'min:3'],
            'employer_id' => ['required', 'exists:employers,id'],
        ]);

        $job = Postion::create($validated);
        $job->load('employer.user');

        return response()->json([
            'success' => true,
            'message' => 'Job created successfully',
            'job' => $job,
        ], 201);
    }

    public function update(Request $request, Postion $job)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'salary' => ['required', 'string', 'min:3'],
            'employer_id' => ['required', 'exists:employers,id'],
        ]);

        $job->update($validated);
        $job->load('employer.user');

        return response()->json([
        'success' => true,
        'message' => 'Job updated successfully',
        'job' => $job
    ]);
    }
    public function show(Postion $job)
    {
        $job->load('employer.user');

        return response()->json([
            'success' => true,
            'job' => $job,
        ]);
    }

    public function delete(Postion $job)
    {

        $job->delete();

        return response()->json([
            'success' => true,
            'message' => 'Job deleted successfully',
        ]);
    }
}