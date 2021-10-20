<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="admin panel of Noqta app.">
    <meta name="keywords"
          content="admin panel of Noqta app.">
    <meta name="author" content="admin panel of Noqta app.">
    <link rel="icon" href="{{asset('default.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('default.png')}}" type="image/x-icon">
    <title>task</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    <link
            href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/fontawesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/feather-icon.css')}}">


    <link rel="stylesheet" type="text/css" href="{{ url('cp/endless/assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('cp/endless/assets/css/datatable-extension.css') }}">


    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/prism.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('cp/endless/assets/css/light-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/responsive.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('cp/endless/assets/css/photoswipe.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cp/endless/assets/css/select2.css') }}">
    <style>
        .customizer-links {
            display: none;
        }

        .activated {
            background-color: #233871;
            padding: 1px 4px;
            border-radius: 3px;
        }
    </style>
    <style>
        @font-face {
            font-family: 'din';
            src: url({{asset('din.otf')}}) format('opentype');
        }

        body, h1, h2, h3, h4, h5, h6, * {
            font-family: 'din';
            font-size: small;
        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
        }

        element.style {
        }

        .selling-update svg path {
            color: #233871;
        }

        .selling-update svg path,
        .selling-update svg line,
        .selling-update svg polyline,
        .selling-update svg polygon,
        .selling-update svg rect,
        .selling-update svg circle,
        .mb-0,
        .f-18,
        .align-abjust,
        h6, h4, h3 {
            color: #233871;
        }

        .page-wrapper .page-body-wrapper .page-sidebar {
            background: black;
        }

        button {
            margin: 2px;
        }
    </style>
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    @yield('imgStylHedr')

</head>
<body main-theme-layout="rtl">
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="loader bg-white">
        <div class="whirly-loader"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row">
            <div class="main-header-left d-lg-none">
                <div class="logo-wrapper">
                    {{--<a class="pull-right mb-0" href="http://2grand.net" target="_blank"><img src="http://radareldad.my-staff.net/grand.png" style="width:100px;">
                    </a>--}}
                    {{--                    <a href="http://2grand.net" target="_blank">--}}
                    {{--                        <img src="{{asset('grand.png')}}" alt=""--}}
                    {{--                             style="width:230px; height:60px;background-color: white;padding: 10px;border-radius: 5px">--}}
                    {{--                    </a>--}}
                </div>
            </div>
            <div class="mobile-sidebar d-block">
                <div class="media-body text-right switch-sm">
                    <label class="switch"><a><i id="sidebar-toggle"
                                                data-feather="align-left"></i></a></label>
                </div>
            </div>
            <div class="nav-right col p-0">
                <ul class="nav-menus">
                    <li class="text-center">
                        @if(Request::is('admin/home*'))


                        {{--                        <form class="form-inline search-form" action="#" method="get" dir="rtl">--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <div class="Typeahead Typeahead--twitterUsers">--}}
                        {{--                                    <div class="u-posRelative">--}}
                        {{--                                        <input class="Typeahead-input --}}{{--form-control-plaintext--}}{{--" id="demo-input"--}}
                        {{--                                               type="text" name="q" placeholder="بحث . . ." style="width:100%">--}}
                        {{--                                        <div class="spinner-border Typeahead-spinner" role="status"><span--}}
                        {{--                                                    class="sr-only">جاري التحميل . . .</span></div>--}}
                        {{--                                        <span class="d-sm-none mobile-search"><i data-feather="search"></i></span>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="Typeahead-menu"></div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </form>--}}
                        @endif
                    </li>
                    <li><a class="text-dark" href="{{route('home')}}#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a></li>
                    {{--<li class="onhover-dropdown"><a class="txt-dark" href="index.html#">
                        <h6>EN</h6>
                        </a>
                      <ul class="language-dropdown onhover-show-div p-20">
                        <li><a href="index.html#" data-lng="en"><i class="flag-icon flag-icon-is"></i> English</a></li>
                        <li><a href="index.html#" data-lng="es"><i class="flag-icon flag-icon-um"></i> Spanish</a></li>
                        <li><a href="index.html#" data-lng="pt"><i class="flag-icon flag-icon-uy"></i> Portuguese</a></li>
                        <li><a href="index.html#" data-lng="fr"><i class="flag-icon flag-icon-nz"></i> French</a></li>
                      </ul>
                    </li>--}}
                    {{--<li class="onhover-dropdown"><i data-feather="bell"></i><span class="dot"></span>
                      <ul class="notification-dropdown onhover-show-div">
                        <li>Notification <span class="badge badge-pill badge-primary pull-right">3</span></li>
                        <li>
                          <div class="media">
                            <div class="media-body">
                              <h6 class="mt-0"><span><i class="shopping-color" data-feather="shopping-bag"></i></span>Your order ready for Ship..!<small class="pull-right">9:00 AM</small></h6>
                              <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="media">
                            <div class="media-body">
                              <h6 class="mt-0 txt-success"><span><i class="download-color font-success" data-feather="download"></i></span>Download Complete<small class="pull-right">2:30 PM</small></h6>
                              <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="media">
                            <div class="media-body">
                              <h6 class="mt-0 txt-danger"><span><i class="alert-color font-danger" data-feather="alert-circle"></i></span>250 MB trash files<small class="pull-right">5:00 PM</small></h6>
                              <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                            </div>
                          </div>
                        </li>
                        <li class="bg-light txt-dark"><a href="index.html#">All</a> notification</li>
                      </ul>
                    </li>--}}
                    {{--
                  <li><a href="{{route('home')}}#"><i class="right_side_toggle" data-feather="message-circle"></i><span class="dot"></span></a></li>
                  --}}
                    <b>{{Auth::user()->name}}</b>
                    <li class="onhover-dropdown">
                        <div class="media align-items-center">
                            <img class="align-self-center pull-right img-50 rounded-circle"
                                 src="{{asset('default.png')}}" alt="header-user">
                            <div class="dotted-animation"><span class="animate-circle"></span><span
                                        class="main-circle"></span></div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20">
                            {{--<li><a href="index.html#"><i data-feather="user"></i>                                    Edit Profile</a></li>
                            <li><a href="index.html#"><i data-feather="mail"></i>                                    Inbox</a></li>
                            <li><a href="index.html#"><i data-feather="lock"></i>                                    Lock Screen</a></li>
                            <li><a href="index.html#"><i data-feather="settings"></i>                                    Settings</a></li>--}}
                            <li><a href="{{ route('logout') }}"

                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    خروج
                                    <i data-feather="log-out"></i>

                                </a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
            </div>
            <script id="result-template" type="text/x-handlebars-template">
                <div class="ProfileCard u-cf">
                    <div class="ProfileCard-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-airplay m-0">
                            <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                            <polygon points="12 15 17 21 7 21 12 15"></polygon>
                        </svg>
                    </div>
                    <div class="ProfileCard-details">
                        <div class="ProfileCard-realName"></div>
                    </div>
                </div>
            </script>
            <script id="empty-template" type="text/x-handlebars-template">
                <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down,
                    yikes!
                </div>

            </script>
        </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="page-sidebar">
            {{--            <div class="main-header-left d-none d-lg-block">--}}
            {{--                <div class="logo-wrapper"><a href="http://2grand.net" target="_blank">--}}
            {{--                        <img src="{{asset('grand.png')}}" alt=""--}}
            {{--                             style="width:230px; height:60px;background-color: white;padding: 10px;border-radius: 10px">--}}
            {{--                    </a></div>--}}
            {{--            </div>--}}


            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div>
                        <img class="img-60 rounded-circle" src="{{asset('default.png')}}" alt="#">
                        {{--<div class="profile-edit"><a href="edit-profile.html" target="_blank"><i data-feather="edit"></i></a></div>--}}
                    </div>
                    <h6 class="mt-3 f-14">تطبيق task</h6>
                    <p> مدير النظام</p>
                </div>
                <ul class="sidebar-menu">
                    <li class="{{Request::is('admin/home*') ? "activated" : "" }}">

                        <a class="sidebar-header" href="{{route('home')}}"><i data-feather="home"></i>
                            {{--@if (auth()->user()->hasPermissionTo('Show dashboard'))--}}

                            <span>الرئيسية</span>

                        </a>
                    </li>

                    <li class="{{Request::is('admin/categories*') ? "activated" : "" }}">
                        <a class="sidebar-header" href="{{asset('/admin/categories')}}"><i data-feather="server"></i>
                            <span>الاقسام</span>
                            {{--                            <i class="fa fa-angle-right pull-right"></i>--}}
                        </a>
                    </li>

                    <li class="{{Request::is('admin/courses*') ? "activated" : "" }}">
                        <a class="sidebar-header" href="{{asset('/admin/courses')}}"><i data-feather="chrome"></i>
                            <span>الكورسات</span>
                            {{--                            <i class="fa fa-angle-right pull-right"></i>--}}
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->
        <!-- Right sidebar Start-->
        <div class="right-sidebar" id="right_side_bar">
            <div class="container p-0">
                <div class="modal-header p-l-20 p-r-20">
                    <div class="col-sm-8 p-0">
                        <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                    </div>
                    <div class="col-sm-4 text-right p-0"><i class="mr-2" data-feather="settings"></i></div>
                </div>
            </div>
            <div class="friend-list-search mt-0">
                <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
            </div>
            <div class="chat-box">
                <div class="people-list friend-list">
                    <ul class="list">
                        <li class="clearfix"><img class="rounded-circle user-image"
                                                  src="{{asset('cp/endless/assets/images/user/1.jpg')}}" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">Vincent Porter</div>
                                <div class="status"> Online</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image"
                                                  src="{{asset('cp/endless/assets/images/user/2.png')}}" alt="">
                            <div class="status-circle away"></div>
                            <div class="about">
                                <div class="name">Ain Chavez</div>
                                <div class="status"> 28 minutes ago</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image"
                                                  src="{{asset('cp/endless/assets/images/user/8.jpg')}}" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">Kori Thomas</div>
                                <div class="status"> Online</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image"
                                                  src="{{asset('cp/endless/assets/images/user/4.jpg')}}" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">Erica Hughes</div>
                                <div class="status"> Online</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image"
                                                  src="{{asset('cp/endless/assets/images/user/5.jpg')}}" alt="">
                            <div class="status-circle offline"></div>
                            <div class="about">
                                <div class="name">Ginger Johnston</div>
                                <div class="status"> 2 minutes ago</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image"
                                                  src="{{asset('cp/endless/assets/images/user/6.jpg')}}" alt="">
                            <div class="status-circle away"></div>
                            <div class="about">
                                <div class="name">Prasanth Anand</div>
                                <div class="status"> 2 hour ago</div>
                            </div>
                        </li>
                        <li class="clearfix"><img class="rounded-circle user-image"
                                                  src="{{asset('cp/endless/assets/images/user/7.jpg')}}" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">Hileri Jecno</div>
                                <div class="status"> Online</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Right sidebar Ends-->


    <?php /*if(session()->has('insert_message')): */?><!--

          <div class="alert alert-success dark">
              <?php /*echo e(session()->get('insert_message')); */?>

            </div>

--><?php /*endif; */?>




    @yield('content')





    <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                {{--                <div class="row">--}}

                {{--                    <a class="pull-right mb-0" href="http://2grand.net" target="_blank" style="margin: auto">--}}
                {{--                        <img src="{{asset('grand.png')}}" style="width:100px;">--}}
                {{--                    </a>--}}
                <div class="col-md-12 footer-copyright" style="text-align: center">
                    <a href="http://allochef-eg.com/" target="_blank">
                        <b class="mb-0" style="color: #233871;"> جميع الحقوق محفوظة
                            &copy;
                        </b>
                    </a>
                    <img src="{{asset('firststep.png')}}" width="50px" height="50px">

                </div>
                {{--                    <div class="col-md-6">--}}
                {{--                      <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </footer>
    </div>
</div>
<!-- latest jquery-->
<script src="{{asset('cp/endless/assets/js/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('cp/endless/assets/js/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/bootstrap/bootstrap.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('cp/endless/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('cp/endless/assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
{{--<script src="{{asset('cp/endless/assets/js/chart/chartist/chartist.js')}}"></script>--}}
<script src="{{asset('cp/endless/assets/js/chart/knob/knob.min.js')}}"></script>
{{--<script src="{{asset('cp/endless/assets/js/chart/knob/knob-chart.js')}}"></script>--}}
<script src="{{asset('cp/endless/assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/notify/bootstrap-notify.min.js')}}"></script>
{{--<script src="{{asset('cp/endless/assets/js/dashboard/default.js')}}"></script>--}}
<script src="{{asset('cp/endless/assets/js/notify/index.js')}}"></script>
<!--    <script src="../assets/js/typeahead/handlebars.js"></script>-->
<!--    <script src="../assets/js/typeahead/typeahead.bundle.js"></script>-->
<!--    <script src="../assets/js/typeahead/typeahead.custom.js"></script>-->
<script src="{{asset('cp/endless/assets/js/chat-menu.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/height-equal.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/tooltip-init.js')}}"></script>
<!--    <script src="../assets/js/typeahead-search/handlebars.js"></script>-->
<!--    <script src="../assets/js/typeahead-search/typeahead-custom.js"></script>-->
<!-- Plugins JS Ends-->
<!-- Theme js-->

<script src="{{asset('cp/endless/assets/js/script.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/theme-customizer/customizer.js')}}"></script>
<!-- Plugin used-->

<!-- photos-->
<script src="{{asset('cp/endless/assets/js/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/photoswipe/photoswipe.js')}}"></script>

<!-- photos-->

<!-- map-->

<script src="{{asset('cp/endless/assets/js/map-js/mapsjs-core.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/map-js/mapsjs-service.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/map-js/mapsjs-ui.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/map-js/mapsjs-mapevents.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('cp/endless/assets/js/select2/select2-custom.js')}}"></script>
{{--        --}}
<script src="{{ url('cp/endless/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ url('cp/endless/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('cp/endless/assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('cp/endless/assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
<script src="{{ url('cp/endless/assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
{{--<script src="{{asset('cp/endless/assets/js/map-js/custom.js')}}"></script><!-- map-->--}}
{{--<script src="{{asset('cp/endless/assets/js/general-widget.js')}}"></script>--}}
</body>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">google.load('visualization', '1.0', {'packages': ['corechart']});</script>


<script>
    $(document).ready(function () {



    });

</script>
<script>
    $('#basic-9').DataTable({
        "language": {
            "sProcessing": "جارٍ التحميل...",
            "sLengthMenu": "أظهر _MENU_ مدخلات",
            "sZeroRecords": "لم يعثر على أية سجلات",
            "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
            "sInfoPostFix": "",
            "sSearch": "ابحث:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "الأول",
                "sPrevious": "السابق",
                "sNext": "التالي",
                "sLast": "الأخير"
            }
        }
    });
</script>
<script>
    $(document).ready(function () {
        $("#demo-input").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@yield('extra-js')

@yield('mapLocation')
</html>

