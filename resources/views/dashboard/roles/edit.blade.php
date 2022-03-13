@extends('layouts.admin.app',['title' =>'Roles Manager'])
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('Role Table')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">{{__('Roles')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Edit')}}</li>
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
                    <h3 class="card-title">{{__('Roles')}}</h3>
                    <div style="float: right">
                        <a href="{{url('admin/roles')}}" class="btn btn-success"><i class="fa fa-plus"></i>
                            {{__('back')}}</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                            <!-- form start -->
                            <form id="create-form">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="guard_name">{{__('cms.guard')}}</label>
                                        <select class="custom-select form-control-border" id="guard_name">
                                            <option value="web" @if($role->guard_name == 'web') selected @endif>Web</option>
                                            <option value="admin" @if($role->guard_name == 'admin') selected @endif>Admin
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{__('cms.name')}}</label>
                                        <input type="text" class="form-control" id="name" placeholder="{{__('cms.enter_name')}}"
                                               name="name" value="{{$role->name}}">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" onclick="performUpdate()" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
    </section>
 @endsection
 @push('scripts')
     <script>
         function performUpdate() {
             axios.put('/admin/roles/{{$role->id}}', {
                 name: document.getElementById('name').value,
                 guard_name: document.getElementById('guard_name').value
             })
                 .then(function (response) {
                     //2xx
                     console.log(response);
                     toastr.success(response.data.message);
                     window.location.href = '/admin/roles';
                 })
                 .catch(function (error) {
                     //4xx - 5xx
                     console.log(error.response.data.message);
                     toastr.error(error.response.data.message);
                 });
         }
     </script>
 @endpush()

