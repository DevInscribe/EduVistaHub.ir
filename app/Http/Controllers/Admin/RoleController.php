<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(100);
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('roles')->ignore($request->name)
            ],
            'label'=> [
                'required',
                'string',
                Rule::unique('roles')->ignore($request->label)
            ],
            'permissions'=>[
                'array',
                'required'
            ]
            // 'g-recaptcha-response'=> ['required',new Recaptcha()]
        ]);

        $role = Role::create($data);
        $role->permissions()->sync($data['permissions']);

        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
            ],
            'label'=> [
                'required',
                'string',
            ],
            'permissions'=>[
                'array',
                'required'
            ]
           ]);

           $role = Role::find($id);
           $role->update($data);
           $role->permissions()->sync($data['permissions']);
           $role->save();

           return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role-> delete();
        return redirect(route('admin.roles.index'));
    }
}
