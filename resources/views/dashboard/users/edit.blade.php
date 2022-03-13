@extends('layouts.admin.app',['title'=> 'Admin Manager'])
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
                            <x-forms.input name="name" label="Name" value="{{$user->name}}"/>
                            <x-forms.input name="email" label="Email" value="{{$user->email}}"/>

                        </div>
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
                        axios.put('/admin/users/{{$user->id}}', {
                            name: document.getElementById('name').value,
                            email: document.getElementById('email').value,
                        })
                            .then(function (response) {
                                //2xx
                                console.log(response);
                                toastr.success(response.data.message);
                                //
                                window.location.href = '/admin/users';
                            })
                            .catch(function (error) {
                                //4xx - 5xx
                                console.log(error.response.data.message);
                                toastr.error(error.response.data.message);
                            });
                    }
                </script>
 @endpush()

