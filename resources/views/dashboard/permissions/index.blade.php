@extends('layouts.admin.app',['title' =>'User Manager'])
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('permissions Table')}} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">{{__('dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{__('permissions')}}</li>
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
                    <h3 class="card-title">{{__('Permissions Table')}}</h3>
                    <div style="float: right">
                        <a href="{{url('admin/permissions/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            {{__('Create')}}</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped datatable" id="user-table" style="width: 100%;">
                        <thead>
                        <tr>

                            <th>#</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Name_guard')}}</th>
                            <th>{{__('Create_At')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->guard_name}}</td>
                                <td>{{($permission->created_at)->format('Y-m-d')}}</td>
                               <td>
                                    <div class="btn-group">
                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i>{{__('edit')}} </a>
                                        <a href="#" onclick="confirmDelete('{{$permission->id}}',this)" class=" btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id,reference) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    performDelete(id,reference);
                }
            });
        }

        function performDelete(id,reference) {
            axios.delete('/admin/permissions/'+id)
                .then(function (response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                    reference.closest('tr').remove();
                })
                .catch(function (error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        }
    </script>
@endpush
