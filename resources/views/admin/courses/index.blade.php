@extends("layouts.admin")

@section('content')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>دوره ها</h2>
                            <div id="add_new_course_section" class="d-flex justify-content-end">
                                <form action="">
                                    <input value="{{request('search')}}" type="search" name="search" id="search-input" placeholder="جست و جو در بين دوره ها ...">
                                    <button id="search-btn" type="submit" class="btn btn-info "><i class="icon material-icons">search</i></button>
                                </form>
                                @can('create_course')
                                <a href="{{route('admin.courses.create')}}" class="btn btn-warning d-inline-block">افزودن دوره جديد</a>  
                                @endcan    
                            </div>
                        </div>
                        <div class="body">
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>شناسه</th>
                                            <th>عنوان دوره</th>
                                            <th>تعداد نظرات</th>
                                            <th>مقدار بازديد</th>
                                            <th>وضعيت دوره</th>
                                            <th>اقدامات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($courses as $course)
                                        <tr>
                                            <td>{{$course->id}}</td>
                                            <td>{{$course->title}}</td>
                                            <td>{{$course->comment_count}}</td>
                                            <td>{{$course->view_count}}</td>
                                            <td>

                                            </td>
                                            <td class="d-flex">

                                                @can('delete_course')
                                                <form method="post" action="{{route('admin.courses.destroy',$course->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class='btn btn-outline-primary btn-sm fw-bold'>حذف</button>
                                                </form>
                                                @endcan

                                                @can('edit_course')
                                                <a class="btn btn-primary btn-sm" href="{{route('admin.courses.edit',$course->id)}}">ويرايش</a>
                                                @endcan
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
@endsection