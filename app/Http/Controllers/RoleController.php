<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $roles = Role::where('id', '>', '1')->orderBy('id', 'DESC')->paginate(5);
        if ($roles->count() > 1) {
            return view('roles.index', compact('roles'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        }
        $message = Lang::get('messages.no_recorde', ['name' => 'Roles']);
        $route = route('roles.create');
        return  redirect('/')->with(['warning' => $message, 'route' => $route]);
    }

    public function create()
    {
        $permission = Permission::all();
        return view('roles.create', compact('permission'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name|regex:/^[A-Za-z]+(\s[A-Za-z]+)*$/',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->withStatus(__('Role created successfully.'));
    }
    // public function show(Role $role)
    // {
    //     $role = Role::find($role);
    //     $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
    //         ->where("role_has_permissions.role_id", $role)
    //         ->get();

    //     return view('roles.show', compact('role', 'rolePermissions'));
    // }

    public function edit(Role $role)
    {
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[A-Za-z]+(\s[A-Za-z]+)*$/',
            'permission' => 'required',
        ]);

        $role = Role::find($role->id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->withStatus(__('Role updated successfully.'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
            ->withStatus(__('Role deleted successfully.'));
    }
}
