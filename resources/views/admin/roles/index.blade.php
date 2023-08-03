@extends("layouts.admin")

@section('content')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>نقش ها</h2>
                            <div id="add_new_role_section" class="d-flex justify-content-end">
                                <form action="">
                                    <input value="{{request('search')}}" type="search" name="search" id="search-input" placeholder="جست و جو در بين نقش ها ...">
                                    <button id="search-btn" type="submit" class="btn btn-info "><i class="icon material-icons">search</i></button>
                                </form>
                                @can('create_role')
                                <a href="{{route('admin.roles.create')}}" class="btn btn-warning d-inline-block">افزودن نقش جديد</a>  
                                @endcan
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
                                                    @can('delete_role')
                                                    <button type="submit" class='btn btn-outline-primary btn-sm fw-bold'>حذف</button>
                                                    @endcan
                                                </form>
                                                @can('edit_role')
                                                <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit',$role->id)}}">ويرايش</a>
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