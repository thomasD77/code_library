<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <i class="fas fa-archive"></i>
            <div class="sidebar-brand-text mx-3">CODE LIBRARY</div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active my-3">
            <a class="nav-link" href="{{route('admin.home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item my-4">
            <a class="collapse-item text-decoration-none text-center text-white ml-3" href="{{route('backend.index')}}"><i class="fas fa-list-ul mr-2"></i>Library</a>
        </li>

{{--        <li class="nav-item my-4">--}}
{{--            <a class="collapse-item text-decoration-none text-center text-white ml-3" href="{{route('keys.index')}}"><i class="fas fa-key  mt-3 mr-2"></i>Keys</a>--}}
{{--        </li>--}}

        <!-- Divider -->
{{--        <hr class="sidebar-divider d-none d-md-block">--}}


{{--        <!-- Nav Item - Admin Store Collapse Menu -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="{{route('orders.index')}}" data-toggle="collapse" data-target="#collapseAdminShop"--}}
{{--               aria-expanded="true" aria-controls="collapseAdminShop">--}}
{{--            </a>--}}

{{--<!--            <div id="collapseAdminShop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-0 m-0 my-1 collapse-inner rounded">--}}
{{--                    <a class="collapse-item" href="{{route('complete.orders')}}"><i class="far fa-check-circle pr-3"></i> Completed</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div id="collapseAdminShop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-0 m-0 my-1 collapse-inner rounded">--}}
{{--                    <a class="collapse-item" href="{{route('coupons.index')}}"><i class="far fa-check-circle pr-3"></i>Coupons</a>--}}
{{--                </div>--}}
{{--            </div>-->--}}
{{--        </li>--}}


        <!-- Nav Item - Users Collapse Menu -->
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"--}}
{{--               aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                <i class="far fa-image"></i>--}}
{{--                <span>FRONTEND</span>--}}
{{--            </a>--}}
{{--            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white m-0 my-1 p-0 collapse-inner rounded text-decoration-underline">--}}
{{--                    <a class="collapse-item" href="{{route('frontend.index')}}"><i class="far fa-eye pr-3"></i>Data</a>--}}
{{--                </div>--}}
{{--<!--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <a class="collapse-item" href="{{route('roles.index')}}"><i class="far fa-check-circle pr-3"></i>Roles</a>--}}
{{--                </div>-->--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        <!-- Divider -->--}}
{{--        <hr class="sidebar-divider">--}}



        <!-- Nav Item - Shop Collapse Menu -->
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShop"--}}
{{--               aria-expanded="true" aria-controls="collapseShop">--}}
{{--                <i class="fas fa-server"></i>--}}
{{--                <span>SERVER</span>--}}
{{--            </a>--}}
{{--            <div id="collapseShop" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white m-0 my-1 p-0 collapse-inner rounded">--}}
{{--                    <a class="collapse-item" href="{{route('server.index')}}"><i class="fas fa-eye pr-3"></i> Data</a>--}}
{{--                </div>--}}
{{--<!--                <div class="bg-white m-0 my-1 p-0 collapse-inner rounded">--}}
{{--                    <a class="collapse-item" href="{{route('brands.index')}}"><i class="far fa-check-circle pr-3"></i> Brands</a>--}}
{{--                </div>--}}
{{--                <div class="bg-white m-0 my-1 p-0 collapse-inner rounded">--}}
{{--                    <a class="collapse-item" href="{{route('productcategories.index')}}"><i class="far fa-check-circle pr-3"></i> Categories</a>--}}
{{--                </div>-->--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        <!-- Divider -->--}}
{{--        <hr class="sidebar-divider d-none d-md-block">--}}


        <!-- Nav Item - Reviews Collapse Menu -->
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReview"--}}
{{--               aria-expanded="true" aria-controls="collapseReview">--}}
{{--                <i class="fas fa-random"></i>--}}
{{--                <span>GENERAL</span>--}}
{{--            </a>--}}
{{--            <div id="collapseReview" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white m-0 my-1 p-0 collapse-inner rounded">--}}
{{--                    <a class="collapse-item" href="{{route('general.index')}}"><i class="far fa-eye pr-3"></i> Data</a>--}}
{{--                </div>--}}
{{--<!--                <div class="bg-white m-0 my-1 p-0 collapse-inner rounded">--}}
{{--                    <a class="collapse-item" href="{{route('reviewreplies.index')}}"><i class="far fa-check-circle pr-3"></i> Replies</a>--}}
{{--                </div>-->--}}
{{--            </div>--}}
{{--        </li>--}}

        <!-- Nav Item - Reviews Collapse Menu -->
<!--        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog"
               aria-expanded="true" aria-controls="collapseBlog">
                <i class="fas fa-blog text-info"></i>
                <span>Blog</span>
            </a>
            <div id="collapseBlog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white m-0 my-1 p-0 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('posts.index')}}"><i class="far fa-check-circle pr-3"></i> Posts</a>
                </div>
                <div class="bg-white m-0 my-1 p-0 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('postcategories.index')}}"><i class="far fa-check-circle pr-3"></i> Categories</a>
                </div>
                <div class="bg-white m-0 my-1 p-0 collapse-inner rounded">
                    <a class="collapse-item" href="https://disqus.com/by/thomasdemeulenaere/" target="_blank"><i class="far fa-check-circle pr-3"></i> Comments</a>
                </div>
            </div>
        </li>-->





        <!-- End of Sidebar -->
    </ul>



