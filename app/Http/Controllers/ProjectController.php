<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;


class ProjectController extends Controller
{
    public function show($id)
    {


        $project = Project::find($id);


        if (!$project) {
            return redirect('/home')->with('error', 'Project not found');
        }


        $project->load('technologies');

        return view('projects.show', compact($project));
    }
}
