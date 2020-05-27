<?php

namespace App\Http\Controllers;

use DB;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::with('roles')->get();

        return view('admin_base', ['users' => $users]);
    }

    public function removeAdmin($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();

        $adminRole = Role::where('name', 'admin')->firstOrFail();

        $user->roles()->detach($adminRole->id);

        return redirect('/admin_base');
    }

    public function giveAdmin($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();

        $adminRole = Role::where('name', 'admin')->firstOrFail();

        $user->roles()->attach($adminRole->id);

        return redirect('/admin_base');
    }

}
