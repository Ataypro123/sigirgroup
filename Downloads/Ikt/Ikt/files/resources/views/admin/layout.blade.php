<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.include.head')
</head>

<body id="page-top">
    @if(session('status'))
        <div class="alert alert-primary status" role="alert">
            {{session('status')}}
        </div>
    @endif

    @if(session('danger'))
        <div class="alert alert-danger danger" role="alert">
            {{session('danger')}}
        </div>
    @endif
    <div id="wrapper">
        <!-- Sidebar -->
        @include('admin.include.sidebar')
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                @include('admin.include.top')
                <!-- Topbar -->

                <!-- Container Fluid-->
                @yield('content')
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                <span>copyright &copy; 2020 - developed by
                  <b><a href="https://bstudio.kg/" target="_blank">BStudio</a></b>
                </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>


    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('admin.include.script')
</body>

</html>
