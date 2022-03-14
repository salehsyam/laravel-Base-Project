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
                <form id="create-form">
                    @csrf 
                    {{$pepole}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{__('name')}}</label>
                            <input type="text" class="form-control" id="name" placeholder="{{__('name')}}" name="name"
                                value="{{$pepole->name}}">
                        </div>
                        <div class="form-group">
                            <label for="mobaile">{{__('mobaile')}}</label>
                            <input type="text" class="form-control" id="mobaile" placeholder="{{__('mobaile')}}"
                                name="mobaile" value="{{$pepole->mobaile}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">{{__('phone')}}</label>
                            <input type="text" class="form-control" id="phone" placeholder="{{__('phone')}}"
                                name="phone" value="{{$pepole->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="identification_number">{{__('identification_number')}}</label>
                            <input type="number" class="form-control" id="identification_number"
                                placeholder="{{__('identification_number')}}" name="identification_number"
                                value="{{$pepole->identification_number}}">
                        </div>
                        <div class="form-group">
                            <label for="apartment_number">{{__('apartment_number')}}</label>
                            <input type="number" class="form-control" id="apartment_number"
                                placeholder="{{__('apartment_number')}}" name="apartment_number"
                                value="{{$pepole->apartment_number}}">
                        </div>
                        <div class="form-group">
                            <label for="floor_number">{{__('floor_number')}}</label>
                            <input type="number" class="form-control" id="floor_number"
                                placeholder="{{__('floor_number')}}" name="floor_number"
                                value="{{$pepole->floor_number}}">
                        </div>
                        <div class="form-group">
                            <label for="family_members">{{__('family_members')}}</label>
                            <input type="number" class="form-control" id="family_members"
                                placeholder="{{__('family_members')}}" name="family_members"
                                value="{{$pepole->family_members}}">
                        </div>
                    </div>
                    <!-- /.card-body -->

            <div class="card-footer">
                <button type="button" onclick="performUpdate()" class="btn btn-primary">{{__('update')}}</button>
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
                        axios.put('/admin/pepoles/{{$pepole->id}}', {
                            name: document.getElementById('name').value,
                            mobaile: document.getElementById('mobaile').value,
                            phone: document.getElementById('phone').value,
                            identification_number: document.getElementById('identification_number').value,
                            apartment_number: document.getElementById('apartment_number').value,
                            floor_number: document.getElementById('floor_number').value,
                            family_members: document.getElementById('family_members').value,
                        })
                            .then(function (response) {
                                //2xx
                                console.log(response);
                                toastr.success(response.data.message);
                                //
                                window.location.href = '/admin/pepoles';
                            })
                            .catch(function (error) {
                                //4xx - 5xx
                                console.log(error.response.data.message);
                                toastr.error(error.response.data.message);
                            });
                    }
</script>
@endpush()