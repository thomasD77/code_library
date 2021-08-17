<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @can('isAdmin')
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <form class="d-flex" action="{{action('App\Http\Controllers\AdminProductsController@search_item')}}" method="post">
                @csrf
                <input name="searchbar" type="text" class="form-control" placeholder="Search for Products...">
                <button class="btn btn-dark" type="submit">Search</button>
            </form>


        </nav>
        <!-- End of Topbar -->
        @endcan






        <!-- Begin Page Content -->
        <div class="container-fluid">



