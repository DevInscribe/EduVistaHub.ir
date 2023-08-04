@extends("layouts.admin")


@section('content')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>  ويرايش دوره <b>"{{$course->title}}"</b></h2>
                            <div id="add_new_course_section" class="d-flex justify-content-end">
                                <a href="{{route('admin.courses.index')}}" class="btn btn-warning d-inline-block">مديريت دوره ها</a>
                            </div>
                        </div>
                            @include('errors.errors')
                            <form  id="nc_admin_form" class="w-50 mx-auto" action="{{route('admin.courses.update',$course->id)}}" method="POST" >
                                    @csrf

                                    @method('PATCH')

                                    <div class="mb-3">
                                        <label for="cnc-input-title" class="form-label">نام دوره</label>
                                        <input name="title" type="text" class="form-control" id="cnc-input-title" value="{{$course->title}}" placeholder="نام دوره را به فارسي وارد کنيد" autofocus
                                            
                                        >
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnc-input-slug" class="form-label">لينک دوره</label>
                                        <input name="slug" type="text" class="form-control" id="cnc-input-slug" value="{{$course->slug}}" placeholder="لينک دوره را به فارسي وارد کنيد" autofocus>
                                    </div>
                                    
                                    <div id="course-type-wrap" class="mb-3">
                                        <label for="cnc-input-body" class="form-label">توضيحات دوره</label>
                                        <textarea name="body" id="cnc-input-body" cols="30" rows="10" placeholder="توضيحات دوره">
                                        {{$course->body}}
                                        </textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="row">
                                            <div id="select-course-type-wrap" class="col-sm-6 ">
                                                <label for="cnc-input-type" class="form-label">نوع دوره</label>
                                                <select name="type" id="cnc-input-type">
                                                    <option value="vip"  {{$course->type == 'vip' ?  'selected' : '' }}>اعضاي ويژه</option>
                                                    <option value="cash" {{$course->type == 'cash' ?  'selected' : '' }}>نقدي</option>
                                                    <option value="free" {{$course->type == 'free' ?  'selected' : '' }}>رايگان</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="cnc-input-price" class="form-label">قيمت دوره</label>
                                                <input name="price" type="text" class="form-control" id="cnc-input-price" value="{{$course->price}}" placeholder="به ريال" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="card mt-4">
                                            <div class="body">
                                                <div class="row">
                                                    @foreach($course->images['images'] as $key => $image)
                                                        <div class="col-sm-6 col-md-3 ">
                                                            <div class="thumbnail">
                                                                <a href="{{url($image)}}">
                                                                    <img class="img-fluid" src="{{url($image)}}" alt="course-img-{{$course->id}}">
                                                                </a>
                                                                <div class="caption">
                                                                    @if($key === "original")
                                                                        <span id="c-img-caption">عکس اصلي</span>
                                                                        @else 
                                                                        <span id="c-img-caption">سايز تصوير : {{$key}} پيکسل</span>
                                                                    @endif
                                                                    <div class="form-check form-check-inline text-center ">
                                                                        <!-- <input type="radio" name="imageThumb" id="image-Thumb" {{$course->images['thumb'] == $image ?  'checked' : '' }}>
                                                                        <label for="image-Thumb">a</label> -->
                                                                        <input class="form-check-label" type="radio" id="imagesThumb" for="imageThumb"
                                                                             name="imageThumb" value="{{$image}}"
                                                                            {{$course->images['thumb'] == $image ?  'checked' : '' }}
                                                                        >
                                                                        <label for="imageThumb" class="form-check-label" value="{{url($image)}}"
                                                                        {{$course->images['thumb'] == $image ?  'checked' : '' }}
                                                                        ></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="cnc-input-time" class="form-label">زمان دوره</label>
                                        <input name="time" type="text" class="form-control " id="cnc-input-time" value="{{$course->time}}" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnc-input-tag" class="form-label">برچسب هاي دوره</label>
                                        <input name="tags" type="text" class="form-control" id="cnc-input-tag" value="{{$course->tags}}" placeholder="برچسب دوره را به فارسي وارد کنيد">
                                    </div>

                                
                                    <button type="submit" class="btn btn-primary mb-5">به روز رساني دوره</button>
                            </form>
                            
                    </div>
                </div>
            </div>



@endsection