@extends('cp.index')
@section('content')

    <div class="page-body">

        <div class="container-fluid" style="display: none">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="page-header-left">
                            <h3>الرئيسية</h3>

                        </div>
                    </div>
                    <!-- Bookmark Start-->
                    <div class="col">
                        <div class="bookmark pull-right">
                            <ul>
                                <li style="display: none"><a href="index.html#" data-container="body"
                                                             data-toggle="popover" data-placement="top" title=""
                                                             data-original-title="Calendar"><i
                                                data-feather="calendar"></i></a></li>
                                <li style="display: none"><a href="index.html#" data-container="body"
                                                             data-toggle="popover" data-placement="top" title=""
                                                             data-original-title="Mail"><i data-feather="mail"></i></a>
                                </li>
                                <li style="display: none"><a href="index.html#" data-container="body"
                                                             data-toggle="popover" data-placement="top" title=""
                                                             data-original-title="Chat"><i
                                                data-feather="message-square"></i></a></li>
                                <li style="display: none"><a href="index.html#"><i class="bookmark-search"
                                                                                   data-feather="star"></i></a>
                                    <form class="form-inline search-form">
                                        <div class="form-group form-control-search">
                                            <input type="text" placeholder="Search..">
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>

    <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-12 xl-100" style="margin-top: 10px">
                    <div class="card">
                        <div class="card-header card-header-border " style="background-color: #233871">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="align-abjust">
                                    <span style="color: white">
                                        <i  class="fa fa-home fa-2x"></i>
                                    </span>
                                        <span style="color: white">
                                        الرئيسية
{{--                                        <button id="print-button"--}}
                                            {{--                                                class="btn btn-success"><span>طباعة التقارير</span></button>--}}
                                    </span>
                                    </h5>
                                </div>
                                <div class="col-sm-6" style="display: none">
                                    <div class="pull-right right-header">
                                        <div class="onhover-dropdown">
                                            <button class="btn btn-primary btn-pill" type="button">All <span class="pr-0"><i class="fa fa-angle-down"></i></span></button>
                                            <div class="onhover-show-div right-header-dropdown"><a class="d-block" href="index.html#">Shipping</a><a class="d-block" href="index.html#">Purchase</a><a class="d-block" href="index.html#">Total Sell</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid" style="margin-top: 20px">
                            <div class="row">
                                <div class="col-sm-6 col-xl-6 col-lg-6">
                                    <div class="card o-hidden">
                                        <div class=" b-r-4 card-body bg-primary" >
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                    <i data-feather="server" style="color: white"></i></div>
                                                <div class="media-body"><span class="m-0" style="color: white">الاقسام</span>
                                                    <h4 class="mb-0 counter "
                                                        style="font-size: x-large;color: white">{{$categories}}</h4>
                                                    <i class="icon-bg" data-feather="server"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6 col-xl-6 col-lg-6">
                                    <div class="card o-hidden">
                                        <div class=" b-r-4 card-body bg-primary">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                    <i data-feather="chrome" ></i></div>
                                                <div class="media-body"><span class="m-0" style="color: white">الكورسات</span>
                                                    <h4 class="mb-0 counter "
                                                        style="font-size: x-large;color: white">{{$courses}}</h4>
                                                    <i class="icon-bg" data-feather="chrome"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->











    </div>
    <!-- Container-fluid Ends-->
@endsection
