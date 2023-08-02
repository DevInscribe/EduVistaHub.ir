@extends("layouts.admin")



@section('content')



<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>افزودن دسترسي جديد</h2>
                            <div id="add_new_permission_section" class="d-flex justify-content-end">
                                <a href="{{route('admin.permissions.index')}}" class="btn btn-warning d-inline-block">مديريت دسترسي ها</a>
                            </div>
                        </div>
                            @include('errors.errors')
                            <form  id="np_admin_form" class="w-50 mx-auto" action="{{route('admin.permissions.store')}}" method="POST" >
                                    @csrf

                                    <div class="mb-3">
                                        <label for="cnp-input-name" class="form-label">نام دسترسي</label>
                                        <input name="name" type="text" class="form-control" id="cnp-input-name" value="{{old('name')}}" placeholder="نام دسترسي را به فارسي وارد کنيد" autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnp-input-label" class="form-label">توضيح دسترسي</label>
                                        <input type="text" name="label" class="form-control" id="cnp-input-label"  value="{{old('label')}}" placeholder="ليبل خود را وارد کنيد">
                                    </div>                                   

                                    <button type="submit" class="btn btn-primary mb-5">ايجاد دسترسي جديد</button>
                            </form>
                            
                    </div>
                </div>
            </div>



@endsection