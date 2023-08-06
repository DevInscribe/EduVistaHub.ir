@extends("layouts.admin")

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>


    <script>
        CKEDITOR.replace('cnc-input-body',{
            filebrowserUploadMethod : 'form',
            filebrowserUploadUrl: "{{route('ckeditor.upload', csrf_token())}}",
            filebrowserImageUploadUrl: '/admin/panel/upload-image',
        });
    </script>


@endsection

@section('content')


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>افزودن دوره جديد</h2>
                            <div id="add_new_course_section" class="d-flex justify-content-end">
                                <a href="{{route('admin.courses.index')}}" class="btn btn-warning d-inline-block">مديريت دوره ها</a>
                            </div>
                        </div>
                            @include('errors.errors')
                            <form enctype="multipart/form-data"  id="nc_admin_form" class="w-50 mx-auto" action="{{route('admin.courses.store')}}" method="POST" >
                                    @csrf

                                    <div class="mb-3">
                                        <label for="cnc-input-title" class="form-label">نام دوره</label>
                                        <input name="title" type="text" class="form-control" id="cnc-input-title" value="{{old('title')}}" placeholder="نام دوره را به فارسي وارد کنيد" autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnc-input-slug" class="form-label">لينک دوره</label>
                                        <input name="slug" type="text" class="form-control" id="cnc-input-slug" value="{{old('slug')}}" placeholder="لينک دوره را به فارسي وارد کنيد" autofocus>
                                    </div>
                                    
                                    <div id="course-type-wrap" class="mb-3">
                                        <label for="cnc-input-body" class="form-label">توضيحات دوره</label>
                                        <textarea name="body" id="cnc-input-body" cols="30" rows="10" placeholder="توضيحات دوره"></textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="row">
                                            <div id="select-course-type-wrap" class="col-sm-6 ">
                                                <label for="cnc-input-type" class="form-label">نوع دوره</label>
                                                <select name="type" id="cnc-input-type">
                                                    <option value="vip">اعضاي ويژه</option>
                                                    <option value="cash">نقدي</option>
                                                    <option value="free">رايگان</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="cnc-input-price" class="form-label">قيمت دوره</label>
                                                <input name="price" type="text" class="form-control" id="cnc-input-price" value="{{old('price')}}" placeholder="به ريال" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="cnc-input-image" class="form-label">تصوير دوره</label>
                                        <input name="images" type="file" class="form-control " id="cnc-input-image" value="{{old('images')}}" >
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="cnc-input-time" class="form-label">زمان دوره</label>
                                        <input name="time" type="text" class="form-control " id="cnc-input-time" value="{{old('time')}}" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnc-input-tag" class="form-label">برچسب هاي دوره</label>
                                        <input name="tags" type="text" class="form-control" id="cnc-input-tag" value="{{old('body')}}" placeholder="برچسب دوره را به فارسي وارد کنيد">
                                    </div>
                                                                    

                                    <button type="submit" class="btn btn-primary mb-5">ايجاد دوره جديد</button>
                            </form>
                            
                    </div>
                </div>
            </div>



@endsection