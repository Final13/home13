<?php

namespace App\Http\Controllers;

use App\Project;
use App\Repositories\ProjectRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\RebootableInterface;

/**
 * @property UserRepositoryInterface user
 * @property ProjectRepositoryInterface project
 */
class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param UserRepositoryInterface $user
     * @param ProjectRepositoryInterface $project
     */
    public function __construct(UserRepositoryInterface $user, ProjectRepositoryInterface $project)
    {
        $this->user = $user;
        $this->project = $project;
        $this->middleware('auth');
    }

    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->isAdmin())
        {
            $projects = $this->project->all();
        }
        else
        {
            $projects = $this->project->projectsWhereUserIdGet();
        }

        return view('projects.index', ['projects' => $projects]);

    }

    public function addProject()
    {
        $users = $this->user->usersWhereNameEmployee();
        return view('projects.add', ['users' => $users]);

    }

    public function saveProject(Request $request)
    {
//        $user = Auth::user();



        $project = new Project();
        $project->fill($request->all());
//        $project->user_id = $user->id;
        $project->is_finished = false;
        $project->save();

        return redirect('projects/index');

    }

    public function deleteProject(Request $request)
    {
        $project = Project::find($request->route('id'));
        $project->delete();

        return redirect('projects/index');
    }

    public function editProject(Request $request)
    {
        $project = Project::find($request->route('id'));

        $users = $this->user->usersWhereNameEmployee();

        return view('projects.edit', ['project' => $project, 'users' => $users]);
    }

    public function updateProject(Request $request)
    {
        $project = Project::find($request->input('id'));
        $project->fill($request->all());
        $project->save();

        return redirect('projects/index');
    }

    public function viewProject(Request $request)
    {
        $project = Project::find($request->route('id'));

        return view('projects.view', ['project' => $project]);
    }
}
