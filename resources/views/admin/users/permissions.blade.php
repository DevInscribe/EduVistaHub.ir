@extends("layouts.admin")



@section('content')



<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>افزودن دسترسي و نقش براي <b>"{{$user->name}}"</b></h2>
                            <div id="add_new_role_section" class="d-flex justify-content-end">
                                <a href="{{route('admin.users.index')}}" class="btn btn-warning d-inline-block">مديريت کاربران</a>
                            </div>
                        </div>
                            @include('errors.errors')
                            <form  id="nr_admin_form" class="w-50 mx-auto" action="{{route('admin.users.permissions.store', $user->id )}}" method="POST" >
                                    @csrf

                                    <div id="permission-select-wrapp" class="mb-3">
                                        <label for="roles" class="form-label"> نقش ها</label>
                                        <select class="form-select" name="roles[]" id="roles" multiple >
                                            @foreach (App\Models\Role::all() as $role)
                                                <option value="{{$role->id}}" {{in_array($role->id,$user->roles->pluck('id')->toArray()) ? 'selected' : ''}}>{{$role->name}} - {{$role->label}}</option>
                                            @endforeach
                                        </select> 
                                    </div>   

                                    <div id="permission-select-wrapp" class="mb-3">
                                        <label for="permissions" class="form-label"> دسترسي ها</label>
                                        <select class="form-select" name="permissions[]" id="permissions-select" multiple >
                                            @foreach (App\Models\Permission::all() as $permission)
                                                <option value="{{$permission->id}}" {{in_array($permission->id,$user->permissions->pluck('id')->toArray()) ? 'selected' : ''}}>{{$permission->name}} - {{$permission->label}}</option>
                                            @endforeach
                                        </select> 
                                    </div>                                   

                                    <button type="submit" class="btn btn-primary mb-5">ثبت دسترسي و نقش کاربر</button>
                            </form>
                            
                    </div>
                </div>
            </div>



@endsection