<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectController extends Controller
{
    public function index() {
        $projects = Projects::orderBy('name', 'desc')->get();
    
       return view('projects.index', [
           'projects' => $projects,
        ]);
    }

    public function show($id) {

        $project = Projects::findOrFail($id);

       return view('projects.show', ['project' => $project]);
    }

    public function create() {
        return view('projects.create');
    }

    public function store(Request $request) {
        $project = Projects::create([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'opgave' => $request->get('opgave'),
            'extra' => $request->get('extra')
        ]);  

        return redirect('/')->with('msg', 'Created Project: <a href="/projects/' . $project->id . '">' . $project->name . '</a>');
    }

    public function destroy(Request $request) {

        $project = Projects::findOrFail($request->id);
        $project->delete();
        return redirect('/')->with('msg', 'Your project is now done');
      
    }

    public function update(Request $request)
    {
        $project = Projects::findOrFail($request->id);

        $project->update([
            'name' => $request->get('project_name'),
            'opgave' => $request->get('project_opgave')
        ]);

        return [
            "success" => true,
            "bgColor" => "bg-black",
            "message" => "Successfully updated the project!",
            "project" => $project
        ];
    }
}