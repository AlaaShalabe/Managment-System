<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->paginate(5);
        $roles = Role::all();
        if (!$roles) {
            $message = Lang::get('messages.create', ['name' => 'Roles']);
            $route = route('roles.create');
            return  redirect('/')->with(['warning' => $message, 'route' => $route]);
        } elseif ($users) {

            return view('users.index', compact('users'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        }
        $message = Lang::get('messages.no_recorde', ['name' => 'users']);
        $route = route('users.create');
        return  redirect('/')->with(['warning' => $message, 'route' => $route]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|regex:/^[A-Za-z]+(\s[A-Za-z]+)*$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|same:confirm-password',
            'confirm-password' => 'required',
            'roles_name' => 'required'

        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $user->assignRole($request->roles_name);

        return redirect()->route('users.index')->with('status', 'User created successfully.');
    }

    public function show(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.show', compact('user', 'roles', 'userRole'));
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email',
            'roles_name' => 'required'
        ]);

        $input = $request->only(['name', 'email', 'roles_name']);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($request->input('roles_name'));

        return redirect()->route('users.index')->withStatus(__('User updated successfully.'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->withStatus(__('User deleted successfully.'));
    }
}
