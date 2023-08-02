@extends("layouts.admin")

@section('content')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>نقش ها</h2>
                            <div id="add_new_role_section" class="d-flex justify-content-end">
                                <a href="{{route('admin.roles.create')}}" class="btn btn-warning d-inline-block">افزودن نقش جديد</a>  
                            </div>
                        </div>
                        <div class="body">
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>شناسه</th>
                                            <th>نام نقش </th>
                                            <th>توضيح نقش</th>
                                            <th>اقدامات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->label}}</td>
                                            <td class="d-flex">
                                                <form method="post" action="{{route('admin.roles.destroy',$role->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class='btn btn-outline-primary btn-sm fw-bold'>حذف</button>
                                                </form>
                                                <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit',$role->id)}}">ويرايش</a>
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