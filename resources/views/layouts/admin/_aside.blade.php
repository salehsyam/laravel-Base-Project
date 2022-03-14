<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/users') }}"  class="brand-link">
        <img  src="{{asset('admin_files/img/AdminLTELogo.png')}}"
              alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3"
              style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img  src="{{asset('admin_files/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <p  class="text-white-50" > {{auth()->user()->name ??"" }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <span>{{__('Dashboard')}}</span>
                    </a></li>
                @canany(['Create-Role','Read-Roles', 'Create-Permission','Read-Permissions'])
                    <li class="nav-header">{{__('roles_permissions')}}</li>
                    @canany(['Create-Role','Read-Roles'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{__('Roles')}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('Read-Roles')
                                    <li class="nav-item">
                                        <a href="{{route('admin.roles.index')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__('index')}}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('Create-Role')
                                    <li class="nav-item">
                                        <a href="{{route('admin.roles.create')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__('create')}}</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany
                    @canany(['Create-Permission','Read-Permissions'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{__('Permissions')}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('Read-Permissions')
                                    <li class="nav-item">
                                        <a href="{{route('admin.permissions.index')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__('index')}}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('Create-Permission')
                                    <li class="nav-item">
                                        <a href="{{route('admin.permissions.create')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__('create')}}</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany
                @endcanany

                @canany(['Create-Admin','Read-Admins','Create-User','Read-Users'])
                    <li class="nav-header">{{__('cms.hr')}}</li>
                    @canany(['Create-Admin','Read-Admins'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{__('admins')}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('Read-Admins')
                                    <li class="nav-item">
                                        <a href="{{route('admin.admins.index')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__('index')}}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('Create-Admin')
                                    <li class="nav-item">
                                        <a href="{{route('admin.admins.create')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__('create')}}</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany
                    @canany(['Create-User','Read-Users'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    {{__('users')}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('Read-Users')
                                    <li class="nav-item">
                                        <a href="{{route('admin.users.index')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__('index')}}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('Create-User')
                                    <li class="nav-item">
                                        <a href="{{route('admin.users.create')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__('create')}}</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany
                @endcanany
               <li class="nav-item">
                    <a href="{{route('admin.pepoles.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            {{__('pepole')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
               </li>

               </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
