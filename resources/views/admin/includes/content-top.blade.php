<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">


        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">




        <div>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                <i class="fas fa-sign-out-alt mx-3"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none bg-dark">
                @csrf
            </form>
        </div>



        </nav>
        <!-- End of Topbar -->







        <!-- Begin Page Content -->
        <div class="container-fluid">



