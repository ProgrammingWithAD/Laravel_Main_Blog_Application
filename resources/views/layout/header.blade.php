<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
    <div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->
      <div class="navbar-brand-box border-bottom">
        <a href="dashboard" class="logo logo-dark">
        <span class="logo-sm"> <span class="logo-txt">DB</span> </span>
        <span class="logo-lg"> <span class="logo-txt">LaraBlog</span> </span>
        </a>
      </div>

      <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>

        <!-- App Search-->
      <h2 class="mb-0 d-flex align-items-center">LaraBlog</h2>
    </div>

    <div class="d-flex">
     <div class="dropdown d-inline-block">
      <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle header-profile-user" src="{{asset('images/defaut-profile-pic.jpg')}}" alt="Header Avatar">
        <span class="d-none d-xl-inline-block ms-1 fw-medium"> {{ Auth::user()->name }}</span>
        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
      </button>

      <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <a class="dropdown-item" href="change-password"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i>Change Password</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{route('logout')}}"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
      </div>
     </div>
    </div>
    </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

    <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
       

        <li> <a href="{{route('dashboard')}}"><i data-feather="home"></i><span data-key="t-cab">Dashboard</span></a></li>
        <li> <a href="{{route('blog-add')}}"><i data-feather="plus-circle"></i><span data-key="t-blog-add">Blog Add</span></a></li> 
        <li> <a href="{{route('blog-list')}}"><i data-feather="list"></i><span data-key="t-blog-list">Blog List</span></a></li>
        <li> <a href="{{route('category')}}"><i data-feather="bookmark"></i><span data-key="t-cat-list">Blog Category</span></a></li>




        <li> <a href="employee"><i data-feather="user"></i><span data-key="t-employee">Employee</span></a></li>

        


         <li> <a href="company"><i data-feather="settings"></i><span data-key="t-company">Company</span></a></li>

        <!-- <li>
         <a href="javascript: void(0);" class="has-arrow"><i data-feather="users"></i><span data-key="t-pages">Guest</span></a>
         <ul class="sub-menu" aria-expanded="false">
            <li><a href="guest-entry">Add Guest</a></li>
            <li><a href="guest-entry-excel">Bulk Upload</a></li>
            <li><a href="guest-list">List Guests</a></li>
            <li><a href="guest-source">Guests Source</a></li>
         </ul>
        </li> -->

        </ul>

    </div>
    <!-- Sidebar -->
    </div>
    </div>
    <!-- Left Sidebar End -->
