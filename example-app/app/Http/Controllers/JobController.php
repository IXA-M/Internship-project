<?php

namespace App\Http\Controllers;

use App\Models\Postion;
use Illuminate\Http\Request;
use App\Models\Employer;
use \Illuminate\Support\Arr;

class JobController extends Controller

{
    public function jobs(){
    $jobs=Postion::with('employer')->simplePaginate(3);

        // $jobs = Postion::all();
        
        return view('jobs.index',compact('jobs') );
        
   }
    public function create(){
        $employers=employer::all();
         return view('jobs.create', compact('employers'));
    }
    public function store(Request $request){
        $request->validate([
        'title' => 'required|string|max:255|min:3',
        'salary' => 'required|string|min:3',
        'employer_id'   => 'required'
        ]);
        Postion::create([
        'title' => $request->title,
        'salary' => $request->salary,
        'employer_id' => $request->employer_id,
    ]);
        return redirect('jobs')->with('success','Created');
    }
public function edit($id)
    {
        $job = Postion::findOrFail($id);
        $employers = Employer::all();

        return view('jobs.edit', compact('job', 'employers'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'salary' => 'required|string|min:3',
            'employer_id'=> 'required'
    ]);
    $postion=Postion::findOrFail($id);
    $postion->update($request->all());
    return redirect('jobs/'.$postion->id)->with('success','Job  '.$postion->title .' updated');
    }

    public function delete($id){
        $postion=Postion::findOrFail($id);
        Postion::destroy($id);

        return redirect('jobs')->with('success','Job  '.$postion->title .' deleted');

    }


    public function form(){
        dd('request got');
    }
    }

