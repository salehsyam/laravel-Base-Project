@extends('layouts.admin.app',['title' =>'User manger'])
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('Users Table')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">{{__('users')}}</a></li>
                        <li class="breadcrumb-item active">{{__('create')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{__('User.create')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create-form">
                        @csrf
                        <div class="card-body">
                            <x-forms.input name="name" label="Name" placeholder="Enter Your Name"/>

                            <x-forms.input name="email" label="Email" type="email" placeholder="Enter Your email"/>

                            <x-forms.input name="password" label="Password" type="password" placeholder="Enter Your password"/>

                            <x-forms.input name="password_confirmation" label="password_confirmation" type="password" placeholder="Enter Your password_confirmation"/>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" onclick="performStore()"
                                    class="btn btn-primary">{{__('Add')}}</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
@endsection
@push('scripts')
 <script>
     function performStore() {
         axios.post('/admin/users', {
             name: document.getElementById('name').value,
             email: document.getElementById('email').value,
             password: document.getElementById('password').value,
             password_confirmation: document.getElementById('password_confirmation').value,
         })
             .then(function (response) {
                 //2xx
                 console.log(response);
                 toastr.success(response.data.message);
                 document.getElementById('create-form').reset();
             })
             .catch(function (error) {
                 //4xx - 5xx
                 console.log(error.response.data.message);
                 toastr.error(error.response.data.message);
             });
     }
 </script>
@endpush
