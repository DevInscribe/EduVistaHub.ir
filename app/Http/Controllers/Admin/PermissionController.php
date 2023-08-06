<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{

    public function __construct(){
        $this->middleware('can:create_permission')->only(['create']);
        $this->middleware('can:delete_permission')->only(['destroy']);
        $this->middleware('can:edit_permission')->only(['edit','update']);
        $this->middleware('can:show_permissions')->only(['index']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $permissions = Permission::query();
        if($keyword = request('search')){
                $permissions-> where('name','like',"%$keyword%")->orWhere('label','like',"%$keyword%");
        }

        $permissions = $permissions->latest()->paginate(100);
        return view('admin.permissions.index',compact('permissions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('permissions')->ignore($request->name)
            ],
            'label'=> [
                'required',
                'string',
                Rule::unique('permissions')->ignore($request->label)
            ],
            // 'g-recaptcha-response'=> ['required',new Recaptcha()]
        ]);
        Permission::create($request->all());
        alert()->success('موفقيت آميز', " دسترسي '{$request->all()["name"]}' با موفقيت ايجاد شد")->persistent(true);
        return redirect(route('admin.permissions.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::find($id);
        return view('admin.permissions.edit', compact('permission'));
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
           ]);
           $permission = Permission::find($id);
           $permission->update($data);
           $permission->save();
           alert()->success('موفقيت آميز', " دسترسي '{$request->all()["name"]}' با موفقيت به روز رساني شد")->persistent(true);
           return redirect(route('admin.permissions.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::find($id);
        $permission-> delete();

        return redirect(route('admin.permissions.index'));
    }
}
