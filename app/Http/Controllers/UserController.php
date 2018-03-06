<?php
/**
 * Created by PhpStorm.
 * User: anka
 * Date: 06.03.2018
 * Time: 13:57
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::get();
        return view('users.index', ['users' => $users]);
    }


    public function addUser(Request $request)
    {
        return view('users.add');

    }

    public function saveUser(Request $request)
    {

        $user = User::create([
            'first_name'     => $request['first_name'],
            'last_name'     => $request['last_name'],
            'email'    => $request['email'],
            'birthday'    => $request['birthday'],
            'password' => bcrypt($request['password']),
        ]);
        $user
            ->roles()
            ->attach(Role::where('name', 'employee')->first());

        return redirect()->route('users');

    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->route('id'));
        $user->delete();

        return redirect('users.index');
    }

    public function editUser(Request $request)
    {
        $user = User::find($request->route('id'));

        return view('users.edit', ['user' => $user]);
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->fill($request->all());
        $user->save();

        return redirect()->route('users');
    }
}