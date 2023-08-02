@extends("layouts.admin")


@section('content')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>  ويرايش نقش <span id="ep-admin-un">"{{$role->name}}"</span></h2>
                            <div id="add_new_role_section" class="d-flex justify-content-end">
                                <a href="{{route('admin.roles.index')}}" class="btn btn-warning d-inline-block">مديريت نقش ها</a>
                            </div>
                        </div>
                            @include('errors.errors')
                            <form  id="nr_admin_form" class="w-50 mx-auto" action="{{route('admin.roles.update',$role->id)}}" method="POST" >
                                    @csrf

                                    @method('PATCH')

                                    <div class="mb-3">
                                        <label for="cnr-input-name" class="form-label">نام نقش</label>
                                        <input name="name" type="text" class="form-control" id="cnr-input-name" value="{{$role->name}}" placeholder="نام نقش را به فارسي وارد کنيد">
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnr-input-label" class="form-label">توضيحات</label>
                                        <input type="text" name="label" class="form-control" id="cnr-input-label"  value="{{$role->label}}" placeholder="توضيحات نقش خود را وارد کنيد">
                                    </div>

                                
                                    <button type="submit" class="btn btn-primary mb-5">به روز رساني نقش</button>
                            </form>
                            
                    </div>
                </div>
            </div>



@endsection