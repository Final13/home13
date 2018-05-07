<?php

namespace App\Repositories;

use App\Project;
use Illuminate\Support\Facades\Auth;

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

    /**
     * @return mixed
     */
    public function getProjectsByUserId()
    {
        return Project::where('user_id', Auth::user()->id)->get();
    }

    public function getProjectsById($id)
    {
        return Project::find($id);
    }

    public function getProjectsByInputId($id)
    {
        return Project::find($id);
    }

    public function saveProject($inputs)
    {
        $project = new Project();
        $project->fill($inputs);
        $project->is_finished = false;
        $project->save();

        return $project;

    }

    public function updateProject($inputs)
    {
        $project = $this->getProjectsByInputId($inputs)->first();
        $project->fill($inputs);
        $project->save();

        return $project;
    }
}