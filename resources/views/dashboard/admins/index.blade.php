@extends('layouts.admin.app',['title' =>'Admin manger'])
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('Admin Table')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Admins')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Dashboard')}}</li>
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
                    <h3 class="card-title">{{__('Admins Table')}}</h3>
                    <div style="float: right">
                        <a href="{{url('admin/admins/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
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
                            <th>{{__('Email')}}</th>
                            <th>{{__('Role')}}</th>
                            <th>{{__('Create_At')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->roles[0]->name ?? ''}}</td>
                                <td>{{($admin->created_at)->format('Y-m-d')}}</td>
                                <td>
                                    <div class="btn-group">
                                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i> edit</a>
                                        <a href="#" onclick="confirmDelete('{{$admin->id}}',this)" class=" btn btn-danger">
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
            axios.delete('/admin/admins/'+id)
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
