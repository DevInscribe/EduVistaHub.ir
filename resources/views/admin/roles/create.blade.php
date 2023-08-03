@extends("layouts.admin")



@section('content')



<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>افزودن نقش جديد</h2>
                            <div id="add_new_role_section" class="d-flex justify-content-end">
                                <a href="{{route('admin.roles.index')}}" class="btn btn-warning d-inline-block">مديريت نقش ها</a>
                            </div>
                        </div>
                            @include('errors.errors')
                            <form  id="nr_admin_form" class="w-50 mx-auto" action="{{route('admin.roles.store')}}" method="POST" >
                                    @csrf

                                    <div class="mb-3">
                                        <label for="cnr-input-name" class="form-label">نام نقش</label>
                                        <input name="name" type="text" class="form-control" id="cnr-input-name" value="{{old('name')}}" placeholder="نام نقش را به فارسي وارد کنيد" autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnr-input-label" class="form-label">توضيح دسترسي</label>
                                        <input type="text" name="label" class="form-control" id="cnr-input-label"  value="{{old('label')}}" placeholder="ليبل خود را وارد کنيد">
                                    </div>      

                                    <div id="permission-select-wrapp" class="mb-3">
                                        <label for="permissions" class="form-label"> دسترسي ها</label>
                                        <select class="form-select" name="permissions[]" id="permissions-select" multiple >
                                            @foreach (App\Models\Permission::all() as $permission)
                                                <option value="{{$permission->id}}">{{$permission->name}} - {{$permission->label}}</option>
                                            @endforeach
                                        </select> 
                                    </div>                                   

                                    <button type="submit" class="btn btn-primary mb-5">ايجاد نقش جديد</button>
                            </form>
                            
                    </div>
                </div>
            </div>



@endsection