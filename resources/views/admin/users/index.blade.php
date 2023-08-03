@extends("layouts.admin")

@section('content')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>کاربران</h2>
                            <div id="add_new_user_section" class="d-flex justify-content-end">
                                <a href="{{route('admin.users.create')}}" class="btn btn-warning d-inline-block">افزودن کاربر جديد</a>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>شناسه</th>
                                            <th>نام و نام خانوادگي</th>
                                            <th>ايميل</th>
                                            <th>اقدامات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="d-flex">
                                                <form method="post" action="{{route('admin.users.destroy',$user->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class='btn btn-outline-primary btn-sm fw-bold'>حذف</button>
                                                </form>
                                                <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit',$user->id)}}">ويرايش</a>
                                                @if($user->isStaffUser())
                                                    <a class="btn btn-info btn-sm" href="{{route('admin.users.permissions',$user->id)}}">دسترسي ها</a>
                                                @endif
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