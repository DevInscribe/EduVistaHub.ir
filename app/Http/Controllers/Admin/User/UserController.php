<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $users = User::query();
        if($keyword = request('search')){
                $users-> where('email','like',"%$keyword%")->orWhere('name','like',"%$keyword%")
                        ->orWhere('id',$keyword);
        }

        if(request('admin')){
            $users-> where('is_superuser',1)->orWhere('is_staff', 1);
        }

        $users = $users->latest()->paginate(100);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());
        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $data = $request->validate([
        'name' => 'required',
        'email' => [
            'required',
            Rule::unique('users')->ignore($id)
        ],
       ]);
       if(!is_null($request->password)){
           $request->validate([
            'password' => ['required',"string","min:8"],
           ]);
           $data['password'] = $request->password;
           
       }
       $user = User::find($id);
       $user-> update($data);
       $user-> save();

       return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user-> delete();
        return redirect(route('admin.users.index'));
    }
}
