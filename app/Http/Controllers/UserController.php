<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

/**
 * @property UserRepositoryInterface user
 * @property RoleRepositoryInterface role
 */
class UserController extends Controller
{
    /**
     * UserController constructor.
     * @param UserRepositoryInterface $user
     * @param RoleRepositoryInterface $role
     */
    public function __construct(UserRepositoryInterface $user, RoleRepositoryInterface $role)
    {
        $this->user = $user;
        $this->role = $role;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
//        $users = User::where('first_name', 'LIKE', '%' . $request->search . '%')
//            ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')->paginate(5);

        $search = Input::get('search');
        if(isset($search)){
            $users = $this->user->getSearchedUsers($search);
        }else{
            $users = $this->user->paginate();
        }
        return view('users.index', ['users' => $users]);
    }


    public function addUser(Request $request)
    {
        return view('users.add');

    }

    public function saveUser(UserCreateRequest $request)
    {

        $this->user->saveUser($request->all());

        return redirect()->route('users');

    }

    public function deleteUser(Request $request)
    {
        $user = $this->user->findUserById($request->all());
        $user->delete();

        return redirect('users/index');
    }

    public function editUser(Request $request)
    {
        $user = $this->user->findUserById($request->route('id'));

        return view('users.edit', ['user' => $user]);
    }

    public function updateUser(UserUpdateRequest $request)
    {
        $this->user->updateUser($request->all());

        return redirect()->route('users');
    }

}