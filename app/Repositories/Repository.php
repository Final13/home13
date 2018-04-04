<?php

namespace App\Repositories;

use App\Events;
use App\Project;
use App\User;
use App\Role;

class Repository implements RepositoryInterface
{
    public function all()
    {
        $events = Events::all();
        $projects = Project::all();
        $users = User::all();
        return $repo = array($events,$projects,$users);


    }
}