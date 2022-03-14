@extends('layouts.admin.app',['title' =>'Pepole manger'])
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('Pepole Table')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.pepoles.index')}}">{{__('users')}}</a></li>
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
                            <div class="form-group">
                                <label for="name">{{__('name')}}</label>
                                <input type="text" class="form-control" id="name" placeholder="{{__('name')}}"
                                    name="name" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="mobaile">{{__('mobaile')}}</label>
                                <input type="number" class="form-control" id="mobaile" placeholder="{{__('mobaile')}}"
                                    name="mobaile" value="{{old('mobaile')}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">{{__('phone')}}</label>
                                <input type="number" class="form-control" id="phone" placeholder="{{__('phone')}}"
                                    name="phone" value="{{old('phone')}}">
                            </div>
                            <div class="form-group">
                                <label for="identification_number">{{__('identification_number')}}</label>
                                <input type="number" class="form-control" id="identification_number"
                                    placeholder="{{__('identification_number')}}" name="identification_number"
                                    value="{{old('identification_number')}}">
                            </div>
                            <div class="form-group">
                                <label for="apartment_number">{{__('apartment_number')}}</label>
                                <input type="number" class="form-control" id="apartment_number"
                                    placeholder="{{__('apartment_number')}}" name="apartment_number"
                                    value="{{old('apartment_number')}}">
                            </div>
                            <div class="form-group">
                                <label for="floor_number">{{__('floor_number')}}</label>
                                <input type="number" class="form-control" id="floor_number"
                                    placeholder="{{__('floor_number')}}" name="floor_number"
                                    value="{{old('floor_number')}}">
                            </div>
                            <div class="form-group">
                                <label for="family_members">{{__('family_members')}}</label>
                                <input type="number" class="form-control" id="family_members"
                                    placeholder="{{__('family_members')}}" name="family_members"
                                    value="{{old('family_members')}}">
                            </div>
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
         axios.post('/admin/pepoles', {
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