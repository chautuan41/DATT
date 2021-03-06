<!DOCTYPE html>
<html lang="en">
  <head>
    <meta
      name="description"
      content=""
    />
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="@pratikborsadiya" />
    <meta property="twitter:creator" content="@pratikborsadiya" />
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Admin" />
    <meta property="og:title" content="Free Bootstrap 4 admin theme" />
    <meta
      property="og:url"
      content="http://pratikborsadiya.in/blog/vali-admin"
    />
    <meta property="og:image" content="{{asset('dashboard/images//blog/vali-admin/hero-social.png')}}" />
    <meta
      property="og:description"
      content="E-learning is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular."
    />
    <title>Kiểm Kê - Admin</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/main.css')}}" />
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/font-awesome/4.7.0/css/font-awesome.min.css')}}"/>
  </head>

  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
      <a class="app-header__logo" href="{{route('index-ad')}}">Kiểm Kê</a>
      <!-- Sidebar toggle button--><a
        class="app-sidebar__toggle"
        href="#"
        data-toggle="sidebar"
        aria-label="Hide Sidebar"
      ></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search" />
          <button class="app-search__button">
            <i class="fa fa-search"></i>
          </button>
        </li> -->
        <!--Notification Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications" >
              <i class="fa fa-bell-o fa-lg"></i>
            </a>
        </li>
        <!-- User Menu-->
        <li class="dropdown">
          <a
            class="app-nav__item"
            href="#"
            data-toggle="dropdown"
            aria-label="Open Profile Menu"
            ><i class="fa fa-user fa-lg"></i
          ></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li>
              <a class="dropdown-item" href="#"
                ><i class="fa fa-cog fa-lg"></i> Cài đặt</a
              >
            </li>
            <li>
              <a class="dropdown-item" href="{{route('form-profile',['id'=>Auth::user()->id])}}"
                ><i class="fa fa-user fa-lg"></i> Thông tin cá nhân</a
              >
            </li>
            <li>
              <a class="dropdown-item" href="{{route('admin.logout')}}"
                ><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</a
              >
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">Admin</p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item active" href="#"
            ><i class="app-menu__icon fa fa-dashboard"></i
            ><span class="app-menu__label">Dashboard</span></a
          >
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-th-list"></i
            ><span class="app-menu__label">Danh sách quản lý</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{route('table-teacher')}}"
                ><i class="icon fa fa-circle-o"></i> Quản lý Giảng Viên</a>
            </li>
            <li>
              <a class="treeview-item" href="{{route('table-user')}}"
                ><i class="icon fa fa-circle-o"></i> Quản lý Nhân Viên</a>
            </li>
            <li>
              <a class="treeview-item" href="{{route('table-room')}}"
                ><i class="icon fa fa-circle-o"></i> Quản lý Phòng Máy</a>
            </li>
            <li>
              <a class="treeview-item" href="{{route('table-grade')}}"
                ><i class="icon fa fa-circle-o"></i> Quản lý Lớp Học</a>
            </li>
            <li>
              <a class="treeview-item" href="{{route('Task')}}"
                ><i class="icon fa fa-circle-o"></i> Quản lý Công Việc</a>
            </li>
          </ul>
        </li>
      </ul>
    </aside>
    <main class="app-content">
    @yield('content')
    </main>
    <script src="{{asset('dashboard/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('dashboard/js/popper.min.js')}}"></script>
    <script src=" {{asset('dashboard/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/js/main.js')}}"></script>
    <script src="{{asset('dashboard/js/pace.min.js')}}"></script>
     <!-- Data table plugin-->
     <script type="text/javascript" src="{{asset('dashboard/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('dashboard/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>
