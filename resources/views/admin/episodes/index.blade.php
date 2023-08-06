@extends('layouts.admin')
@section('head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')

    <style>
        th {
            text-align: center;
        }

        body {
            margin: 0;
        }


    </style>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
            <div class="header">
                            <h2>ويديو هاي دوره ها</h2>
                            <div id="add_new_permission_section" class="d-flex justify-content-end">
                                <form action="">
                                    <input value="{{request('search')}}" type="search" name="search" id="search-input" placeholder="جست و جو در بين ويديو ها ...">
                                    <button id="search-btn" type="submit" class="btn btn-info "><i class="icon material-icons">search</i></button>
                                </form>
                                @can('create_episode')
                                <a href="{{route('admin.episodes.create')}}" class="btn btn-warning d-inline-block">افزودن ويديو جديد</a>  
                                @endcan    
                            </div>
                        </div>
                <div class="body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>آیدی</th>
                                <th>عنوان ویدیو</th>
                                <th>دوره مرتبط</th>
                                <th>تعداد نظرات</th>
                                <th>مقدار بازدید</th>
                                <th>تعداد دانلود</th>
                                <th>وضعیت ویدیو</th>
                                <th>اقدامات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($episodes as $episode)
                                <tr>
                                    <td>{{$episode->id}}</td>
                                    <td>{{$episode->title}}</td>
                                    <td>{{$episode->course->title}}</td>
                                    <td>{{$episode->comment_count}}</td>
                                    <td>{{$episode->view_count}}</td>
                                    <td>{{$episode->download_count}}</td>
                                    <td>
                                        @if($episode->type=='vip')
                                            عضویت ویژه
                                        @elseif($episode->type=='cash')
                                            نقدی
                                        @else
                                            رایگان
                                            @endif
                                    </td>
                                    <td style="display: flex; justify-content: center">
                                      @can('delete_episode')
                                            <form action="{{route('admin.episodes.destroy',$episode->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                            </form>
                                        @endcan
                                     @can('edit_episode')
                                              <a href="{{route('admin.episodes.edit',$episode->id)}}"
                                                 class="btn btn-sm btn-primary" style="margin-right: 3px;">ویرایش</a>
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
