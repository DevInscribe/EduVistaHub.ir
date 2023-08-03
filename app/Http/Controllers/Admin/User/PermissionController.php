<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PermissionController extends Controller
{

    function create(string $id) 
    {
        $user = User::find($id);
        return view('admin.users.permissions',compact('user'));
    }

    function store(Request $request , string $id)
    {
        $data = $request->validate([
            'permissions'=>[
                'array',
                'required'
            ],
            'roles'=>[
                'array',
                'required'
            ],
        ]);

        $user = User::find($id);
        $user->permissions()->sync($data['permissions']);
        $user->roles()->sync($data['roles']);
        return redirect(route('admin.users.index'));
    }
}
