<!DOCTYPE html>
<html>

<head>
    
    @yield('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>پنل مديريت فروشگاه</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!--Fonts -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <!--icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <!-- <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" /> -->
</head>

<body class="theme-red">
    @include('sweetalert::alert')
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <p>منتظر بمانيد ...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="جست و جو کنيد ...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#">پنل مديريت فروشگاه</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('images/user.jpg')}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">مدير محترم سايت</div>
                    <div class="email">admin@example.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>پروفايل</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>دنبال کنندگان</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>فروش ها</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>علاقه مندي ها</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>خروج از حساب</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header"> منو اصلي</li>
                    <li class="active">
                        <a href="index.html">
                            <i class="material-icons">home</i>
                            <span class="font-vazir">خانه</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/typography.html">
                            <i class="material-icons">dashboard</i>
                            <span class="mr-5 font-vazir">پنل مديريت سايت</span>
                        </a>
                    </li>

                   @can('show_users')
                    <li class="header">دسترسي ها</li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">group</i>
                            <span class="font-vazir">کاربران</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{route('admin.users.index')}}">
                                    <span class="font-vazir">تمام کاربران</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/users/create">
                                    <span class="font-vazir">افزودن کاربر جديد</span>
                                </a>
                            </li>
                        </ul>
                  </li>
                  @endcan

                 @can('show_permissions')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">handshake</i>
                            <span class="font-vazir">دسترسي ها</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/admin/permissions">
                                    <span class="font-vazir">تمام دسترسي ها</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/permissions/create">
                                    <span class="font-vazir">افزودن دسترسي جديد</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('show_roles')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">work</i>
                            <span class="font-vazir">نقش هاي کاربري</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/admin/roles">
                                    <span class="font-vazir">تمام نقش ها</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/roles/create">
                                    <span class="font-vazir">افزودن نقش جديد</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                   @endcan

                   @can('show_courses')
                    <li class="header">محصولات</li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">store</i>
                            <span class="font-vazir">دوره ها</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/admin/courses">
                                    <span class="font-vazir">تمامي دوره ها</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/courses/create">
                                    <span class="font-vazir">افزودن دوره جديد</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan

                   @can('show_episodes')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">movie</i>
                            <span class="font-vazir"> ويديو هاي دوره ها</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/admin/episodes">
                                    <span class="font-vazir">تمامي ويديو ها</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/episodes/create">
                                    <span class="font-vazir">افزودن ويديو جديد</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">category</i>
                            <span class="font-vazir">دسته ها</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="font-vazir">تمامي دسته ها</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="font-vazir">افزودن دسته جديد</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">تنظيمات</li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons">settings</i>
                            <span class="font-vazir">تنظيمات عمومي</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright font-vazir">
                    <p class="text-center">ساخته شده با 💙 و ☕ توسط  
                        <a href="https://ali-nazari.netlify.app/" target="_blank">علي طباطبايي نظري</a> &copy;2023
                    </p>
                </div>
            </div>       
        </aside>
    </section>

    <section class="content">
        <div class="container-fluid">
                
                @yield("content")
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{asset('plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/pages/index.js')}}"></script>

    <!-- Demo Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/demo.js')}}"></script>
    @yield('js')
</body>

</html>
