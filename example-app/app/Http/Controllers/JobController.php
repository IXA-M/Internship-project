<?php

namespace App\Http\Controllers;

use App\Models\Postion;
use Illuminate\Http\Request;
use App\Models\Employer;


class JobController extends Controller
{
    public function jobs()
    {
        $jobs = Postion::with('employer.user')->simplePaginate(3);

        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $employers = Employer::all();

        return view('jobs.create', compact('employers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'salary' => 'required|string|min:3',
            'employer_id' => 'required',
        ]);

        Postion::create([
            'title' => $request->title,
            'salary' => $request->salary,
            'employer_id' => $request->employer_id,
        ]);

        return redirect('jobs')->with('success', 'Created');
    }

    public function edit(Postion $job){
     
    {   
        //  Gate::authorize('edit-job',$job);

      

        $employers = Employer::all();

        return view('jobs.edit', compact('job', 'employers'));
    }
    }

    public function update(Request $request, Postion $job)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'salary' => 'required|string|min:3',
            'employer_id' => 'required',
        ]);

        $job->update($request->all());

        return redirect('jobs/' . $job->id)
            ->with('success', 'Job ' . $job->title . ' updated');
    }

    public function delete(Postion $job)
    {
        $title = $job->title;

        $job->delete();

        return redirect('jobs')
            ->with('success', 'Job ' . $title . ' deleted');
    }

    public function form()
    {
        dd('request got');
    }
}