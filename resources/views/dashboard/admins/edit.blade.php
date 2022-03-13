@extends('layouts.admin.app')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('Users Table')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">{{__('Users')}}</a></li>
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
                    <h3 class="card-title">{{__('Users')}}</h3>
                    <div style="float: right">
                        <a href="{{url('admin/users')}}" class="btn btn-success"><i class="fa fa-plus"></i>
                            {{__('back')}}</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="role_id">{{__('cms.role')}}</label>
                                <select class="custom-select form-control-border" id="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}" @if($role->id == $adminRole->id) selected
                                            @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">{{__('cms.name')}}</label>
                                <input type="text" class="form-control" id="name" placeholder="{{__('cms.enter_name')}}"
                                       name="name" value="{{$admin->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('cms.email')}}</label>
                                <input type="email" class="form-control" id="email"
                                       placeholder="{{__('cms.enter_email')}}" name="email" value="{{$admin->email}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="performUpdate()"
                                    class="btn btn-primary">{{__('cms.save')}}</button>
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
             axios.put('/admin/admins/{{$admin->id}}', {
                 name: document.getElementById('name').value,
                 email_address: document.getElementById('email').value,
                 role_id: document.getElementById('role_id').value
             })
                 .then(function (response) {
                     //2xx
                     console.log(response);
                     toastr.success(response.data.message);
                     //
                     window.location.href = '/cms/admin/admins';
                 })
                 .catch(function (error) {
                     //4xx - 5xx
                     console.log(error.response.data.message);
                     toastr.error(error.response.data.message);
                 });
         }
     </script>
 @endpush()

