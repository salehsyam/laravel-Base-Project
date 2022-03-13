@extends('layouts.admin.app',['title' =>'Roles Manager'])
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('assigned_permissions Table')}} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">{{__('dashboard')}}</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('admin.roles.index')}}">{{__('role')}}</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$role->name}} {{__('permissions')}}</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>{{__('cms.name')}}</th>
                            <th>{{__('cms.guard')}}</th>
                            <th>{{__('cms.assigned')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->guard_name}}</td>
                                <td>
                                    <div class="icheck-success d-inline">
                                        <input type="checkbox" id="permission_{{$permission->id}}" @if($permission->assigned)
                                        checked @endif
                                               onclick="updateRolePermission('{{$role->id}}','{{$permission->id}}')">
                                        <label for="permission_{{$permission->id}}"></label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix"></div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function updateRolePermission(roleId, permissionId) {
            axios.post('/admin/role/update-permission',{
                'role_id':roleId,
                'permission_id':permissionId
            })
                .then(function (response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                })
                .catch(function (error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        }
    </script>
@endpush
