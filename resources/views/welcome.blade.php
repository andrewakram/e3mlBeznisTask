<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="admin panel of Task app.">
    <meta name="keywords" content="admin panel of Task app.">
    <meta name="author" content="admin panel of Task app.">
    <link rel="icon" href="{{asset('cp/endless/assets/images/logo.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('cp/endless/assets/images/logo.png')}}" type="image/x-icon">
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
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('cp/endless/assets/css/light-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('cp/endless/assets/css/responsive.css')}}">
    <style>

        /*body, h1, h2, h6, h6, h6, h6, * {*/
        /*    font-size: small;*/
        /*}*/

        .filter-categoey {
            cursor: pointer;
        }

        .side-filter {
            border-bottom: solid 2px grey;
        }

        .content-data {
            padding-left: 40px;
        }
    </style>
</head>
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="loader bg-white">
        <div class="whirly-loader"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper" style="margin: 30px">
    <div class="row">
        <div class="col-lg-2">
            <h6 class="side-filter">Categories</h6>

            <ul>
                @foreach($categories as $category)
                    <li>
                        <p class="filter-categoey" filter-categoey="{{$category->id}}" is-selected="0">{{$category->name}}</p>
                    </li>
                @endforeach
            </ul>

            <br>

            <h6 class="side-filter">Course rating</h6>

            <ul>
                <li>
                    <p>
                        <input name="filter_rate" type="radio" value="4.5"class="filter-rate" filter-rate="4.5">
                        4.5
                    </p>
                </li>
                <li>
                    <p>
                        <input name="filter_rate" type="radio" class="filter-rate" filter-rate="4">
                        4
                    </p>
                </li>
                <li>
                    <p>
                        <input name="filter_rate" type="radio" class="filter-rate" filter-rate="3.5">
                        3.5
                    </p>
                </li>
                <li>
                    <p>
                        <input name="filter_rate" type="radio" class="filter-rate" filter-rate="3">
                        3
                    </p>
                </li>
            </ul>

            <br>

            <h6 class="side-filter">Level</h6>

            <ul>
                <li>
                    <p >
                        <input name="filter_level" type="checkbox" value="beginner" class="filter-level" filter-level="beginner">
                        beginner
                    </p>
                </li>
                <li>
                    <p >
                        <input name="filter_level" type="checkbox" value="immediat" class="filter-level" filter-level="immediat">
                        immediat
                    </p>
                </li>
                <li>
                    <p >
                        <input name="filter_level" type="checkbox" value="high" class="filter-level" filter-level="high">
                        high
                    </p>
                </li>
            </ul>

            <br>

            <h6 class="side-filter">Time</h6>

            <ul>
                <li>
                    <p >
                        <input name="filter-time" type="checkbox" value="1" class="filter-time" filter-time="1">
                        less than 4 hrs
                    </p>
                </li>
                <li>
                    <p >
                        <input name="filter-time" type="checkbox" value="2" class="filter-time" filter-time="2">
                        less than 8 hrs
                    </p>
                </li>
                <li>
                    <p >
                        <input name="filter-time" type="checkbox" value="3" class="filter-time" filter-time="3">
                        more than 8 hrs
                    </p>
                </li>
            </ul>

        </div>

        <div class="col-lg-10 content-data">
            <div class="container">
                <div class="row items">
                    @foreach($courses as $course)
                        <div class="col-lg-4" style="border:solid 1px gainsboro;padding: 5px;margin-bottom: 1px">
                            <img height="130px" width="100%" src="{{asset('default.png')}}"
                                 style="border-bottom:solid 1px gainsboro">
                            <h5>{{$course->name}}</h5>
                            <p>
                                <i class="fa fa-user"></i>
                                Author
                            </p>
                            <p>
                                {{$course->description}}
                            </p>
                            @if($course->rate <1)
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                {{--<p>No rate found</p>--}}
                            @else
                                @for($i=0; $i<$course->rate; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                                @if($course->rate < 5)
                                    @for($i=$course->rate; $i<5; $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('cp/endless/assets/js/script.js')}}"></script>
<!-- Plugin used-->

<script>

    var filledStar = '<span class="fa fa-star"></span>\n';
    var emptyStar = '<span class="fa fa-star-o"></span>\n';


    $(document).on('click', '.filter-categoey', function () {
        var category_id = $(this).attr("filter-categoey");
        // var type = $("#type").val();
        // var city_id = $(this).attr("city_id");
        // var region_id = $('.region:checked').attr("region_id");
        // var main_service_id = $('.main_service:checked').attr("main_service_id");

        if (category_id || 1) {
            $.ajax({
                type: "GET",
                url: "{{url('filter-courses')}}" + '?category_id=' + category_id ,
                success: function (result) {
                    if (result) {
                        console.log(result);
                        $(".items").empty();
                        $.each(result.courses, function (key, value) {
                            plus_course(value.id, value.name,value.description, value.levels, value.rate);
                        });
                    }
                    if (result.length === 0) {
                        console.log("datazero");
                    }
                }
            });
        }
    });

    $(document).on('click', '.filter-rate', function () {
        var rate_value = $(this).attr("filter-rate");
        if (rate_value || 1) {
            $.ajax({
                type: "GET",
                url: "{{url('filter-courses')}}" + '?rate_value=' + rate_value ,
                success: function (result) {
                    if (result) {
                        console.log(result);
                        $(".items").empty();
                        $.each(result.courses, function (key, value) {
                            plus_course(value.id, value.name,value.description, value.levels, value.rate);
                        });
                    }
                    if (result.length === 0) {
                        console.log("datazero");
                    }
                }
            });
        }
    });

    $(document).on('click', '.filter-level', function () {
        //var level = $(this).attr("filter-level");
        var levels = [];
        $("input:checkbox[name=filter_level]:checked").each(function(){
            levels.push($(this).val());
        });
        if (levels || 1) {
            $.ajax({
                type: "GET",
                url: "{{url('filter-courses')}}" + '?levels=' + levels ,
                success: function (result) {
                    if (result) {
                        console.log(result);
                        $(".items").empty();
                        $.each(result.courses, function (key, value) {
                            plus_course(value.id, value.name,value.description, value.levels, value.rate);
                        });
                    }
                    if (result.length === 0) {
                        console.log("datazero");
                    }
                }
            });
        }
    });

    $(document).on('click', '.filter-time', function () {
        var time = $(this).attr("filter-time");

        if (time || 1) {
            $.ajax({
                type: "GET",
                url: "{{url('filter-courses')}}" + '?time=' + time ,
                success: function (result) {
                    if (result) {
                        console.log(result);
                        $(".items").empty();
                        $.each(result.courses, function (key, value) {
                            plus_course(value.id, value.name,value.description, value.levels, value.rate);
                        });
                    }
                    if (result.length === 0) {
                        console.log("datazero");
                    }
                }
            });
        }
    });

    function plus_course(course_id, course_name, course_description, course_levels, course_rate) {
        var rate = "";
        var img = "{{asset('default.png')}}";
        var i;
        for (i = 0; i < course_rate; i++) {
            rate = rate.concat(filledStar)
        }
        for (i = course_rate; i < 5; i++) {
            rate = rate.concat(emptyStar)
        }
        var new_course = '<div class="col-lg-4" style="border:solid 1px gainsboro;padding: 5px;margin-bottom: 1px">\n' +
            '                            <img height="130px" width="100%" src="'+ img +'"\n' +
            '                                 style="border-bottom:solid 1px gainsboro">\n' +
            '                            <h5>'+ course_name +'</h5>\n' +
            '                            <p>\n' +
            '                                <i class="fa fa-user"></i>\n' +
            '                                Author\n' +
            '                            </p>\n' +
            '                            <p>\n' +
            '                                '+ course_description +'\n' +
            '                            </p>\n' + rate +
            '                        </div>';

        $('.items').append(new_course);

    }




</script>


</body>
</html>
