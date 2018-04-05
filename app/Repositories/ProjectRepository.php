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

    public function projectsWhereUserIdGet()
    {
        return Project::where('user_id', Auth::user()->id)->get();
    }

}