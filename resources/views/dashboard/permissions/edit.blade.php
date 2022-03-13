@extends('layouts.admin.app',['title' =>'Permission Manager'])
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('Permission Table')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">{{__('Permission')}}</a></li>
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
                    <h3 class="card-title">{{__('Permission')}}</h3>
                    <div style="float: right">
                        <a href="{{url('admin/permissions')}}" class="btn btn-success"><i class="fa fa-plus"></i>
                            {{__('back')}}</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <form>
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="guard_name">{{__('cms.guard')}}</label>
                                  <select class="custom-select form-control-border" id="guard_name">
                                      <option value="web" @if($permission->guard_name == 'web') selected @endif>Web
                                      </option>
                                      <option value="admin" @if($permission->guard_name == 'admin') selected @endif>Admin
                                      </option>
                                  </select>
                              </div>
                            <x-forms.input name="name" label="Name Permission" value="{{$permission->name}}"/>

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
             axios.put('/admin/permissions/{{$permission->id}}', {
                 name: document.getElementById('name').value,
                 guard_name: document.getElementById('guard_name').value
             })
                 .then(function (response) {
                     //2xx
                     console.log(response);
                     toastr.success(response.data.message);
                     window.location.href = '/admin/permissions';
                 })
                 .catch(function (error) {
                     //4xx - 5xx
                     console.log(error.response.data.message);
                     toastr.error(error.response.data.message);
                 });
         }
     </script>
 @endpush()

