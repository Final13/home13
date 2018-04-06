<?php
/**
 * Created by PhpStorm.
 * User: anka
 * Date: 06.03.2018
 * Time: 13:57
 */

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
            $users = $this->user->getSearchedUsers($request);
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

        $user = $this->user->createUser($request);
        $user
            ->roles()
            ->attach($this->role->setRoleEmployee());

        return redirect()->route('users');

    }

    public function deleteUser(Request $request)
    {
        $user = $this->user->findUserById($request);
        $user->delete();

        return redirect('users/index');
    }

    public function editUser(Request $request)
    {
        $user = $this->user->findUserById($request);

        return view('users.edit', ['user' => $user]);
    }

    public function updateUser(UserUpdateRequest $request)
    {
        $user = $this->user->findUserByInputId($request);
        $user->fill($request->all());
        $user->save();

        return redirect()->route('users');
    }

}