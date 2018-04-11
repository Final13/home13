<?php

namespace App\Repositories;

use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function all()
    {
        return Project::all();
    }

    public function paginate()
    {
        return Project::paginate(5);
    }

    public function getProjectsByUserId()
    {
        return Project::where('user_id', Auth::user()->id)->get();
    }

    public function getProjectsById(Request $request)
    {
        return Project::find($request->route('id'));
    }

    public function getProjectsByInputId(Request $request)
    {
        return Project::find($request->input('id'));
    }

    public function saveProject(Request $request)
    {
        $project = new Project();
        $project->fill($request->all());
        $project->is_finished = false;
        $project->save();

        return $project;

    }

    public function updateProject(Request $request)
    {
        $project = $this->getProjectsByInputId($request);
        $project->fill($request->all());
        $project->save();

        return $project;
    }
}