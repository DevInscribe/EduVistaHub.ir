@extends("layouts.admin")



@section('content')

<style>
    .dropdown-toggle{
        display: none;
    }
</style>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>افزودن کاربر جديد</h2>
                            <div id="add_new_user_section" class="d-flex justify-content-end">
                                <a href="{{route('admin.users.index')}}" class="btn btn-warning d-inline-block">مديريت کاربران</a>
                            </div>
                        </div>
                            @include('errors.errors')
                            <form  id="nu_admin_form" class="w-50 mx-auto" action="{{route('admin.users.store')}}" method="POST" >
                                    @csrf

                                    <div class="mb-3">
                                        <label for="cnu-input-name" class="form-label">نام و نام خانوادگي</label>
                                        <input name="name" type="text" class="form-control" id="cnu-input-name" value="{{old('name')}}" placeholder="نام خود را به فارسي وارد کنيد">
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnu-input-email" class="form-label">ايميل</label>
                                        <input type="email" name="email" class="form-control" id="cnu-input-email"  value="{{old('email')}}" placeholder="ايميل معتبر خود را وارد کنيد">
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnu-input-pass" class="form-label">گذرواژه</label>
                                        <input name="password" type="password" class="form-control" id="cnu-input-pass" placeholder="حداقل 8 کاراکتر باشد">
                                    </div>
                                   
                                    <div class="my-5">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="control-label" for="is_superuser">مدير سايت </label>
                                                <select name="is_superuser" id="is_superuser">
                                                    <option value="0"> ------ </option>
                                                    <option value="1"> مدير کل سايت</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label" for="is_staff">همکار سايت</label>
                                                <select name="is_staff" id="is_staff">
                                                    <option value="0"> ------ </option>
                                                    <option value="1">همکار سايت</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   

                                    <button type="submit" class="btn btn-primary mb-5">ايجاد کاربر جديد</button>
                            </form>
                            
                    </div>
                </div>
            </div>



@endsection