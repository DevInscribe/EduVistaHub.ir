<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('can:create_role')->only(['create']);
        $this->middleware('can:delete_role')->only(['destroy']);
        $this->middleware('can:edit_role')->only(['edit','update']);
        $this->middleware('can:show_roles')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::query();
        if($keyword = request('search')){
                $roles-> where('name','like',"%$keyword%")->orWhere('label','like',"%$keyword%");
        }

        $roles = $roles->latest()->paginate(100);
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
        alert()->success('موفقيت آميز', " نقش '{$request->all()["name"]}' با موفقيت ايجاد شد")->persistent(true);
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
           alert()->success('موفقيت آميز', " نقش '{$request->all()["name"]}' با موفقيت به روز رساني شد")->persistent(true);
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
