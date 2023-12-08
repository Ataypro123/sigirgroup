<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        @if(Auth::guard('admin')->check())
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <img class="img-profile rounded-circle" src="{{asset('img/boy.png')}}" style="max-width: 60px">
                    <span class="ml-2 d-none d-lg-inline text-white small">{{Auth::guard('admin')->user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{route('administrator.edit', Auth::guard('admin')->user()->id)}}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Профиль
                    </a>
                    <div class="dropdown-divider"></div>
                    {!! Form::open(['route'=>'admin.logout']) !!}
                    <button type="submit" class="dropdown-item" style="background: none; border: none;">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Выйти
                    </button>
                    {!! Form::close() !!}
                </div>
            </li>
        @endif
    </ul>
</nav>
