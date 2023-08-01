@extends("layouts.admin")


@section('content')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>  ويرايش کاربر <span id="eu-admin-un">{{$user->name}}</span></h2>
                            <div id="add_new_user_section" class="d-flex justify-content-end">
                                <a href="{{route('admin.users.index')}}" class="btn btn-warning d-inline-block">مديريت کاربران</a>
                            </div>
                        </div>
                            @include('errors.errors')
                            <form  id="nu_admin_form" class="w-50 mx-auto" action="{{route('admin.users.update',$user->id)}}" method="POST" >
                                    @csrf

                                    @method('PATCH')

                                    <div class="mb-3">
                                        <label for="cnu-input-name" class="form-label">نام و نام خانوادگي</label>
                                        <input name="name" type="text" class="form-control" id="cnu-input-name" value="{{$user->name}}" placeholder="نام خود را به فارسي وارد کنيد">
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnu-input-email" class="form-label">ايميل</label>
                                        <input type="email" name="email" class="form-control" id="cnu-input-email"  value="{{$user->email}}" placeholder="ايميل معتبر خود را وارد کنيد">
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnu-input-pass" class="form-label">گذرواژه</label>
                                        <input name="password" type="password" class="form-control" id="cnu-input-pass" placeholder="حداقل 8 کاراکتر باشد">
                                    </div>
                                   

                                    <button type="submit" class="btn btn-primary mb-5">به روز رساني کاربر</button>
                            </form>
                            
                    </div>
                </div>
            </div>



@endsection