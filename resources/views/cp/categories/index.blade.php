@extends('cp.index')
@section('content')

    <div class="page-body" dir="rtl">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <div class="page-header-right">


                            @include('cp.layouts.messages')

                        </div>
                    </div>

                    <!-- Container-fluid starts-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header " style="background-color: #233871">
                                        <h3 style="color: white">
                                            <i class="fa fa-home " ></i>
                                            <a class="" href="{{route('home')}}" style="color: white">
                                                الرئيسية
                                            </a>
                                            /
                                            الاقسام
                                            <div style="float: left">
                                                {{--                            @if(auth()->user()->hasPermissionTo('اضافة قسم'))--}}
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subCat"><i
                                                        class="icon-plus"></i>
                                                    اضافة قسم
                                                </button>
                                                {{--                            @endif--}}
                                            </div>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="display" id="basic-9">
                                                <thead class="">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">الحالة</th>
                                                    <th scope="col">الاسم</th>
                                                    <th scope="col">الاختيارات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($categories as $key => $category)
                                                    <tr id="main_cat_{{$category->id}}" >
                                                        <td>{{$key+1}}</td>
                                                        <td>
                                                            <div class="nav-right col p-0">
                                                                <div class="media">
                                                                    <div class="media-body icon-state switch-outline">
                                                                        <label class="switch" >
                                                                            <input type="checkbox" id="status" model_id="{{$category->id}}"
                                                                                   @if($category->active == 1)  checked @endif><span
                                                                                class="switch-state bg-success"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{$category->name}}
                                                        </td>

                                                        <td>
                                                            <button title="تعديل" type="button" class="btn btn-warning"
                                                                    data-toggle="modal" data-target="#edit_{{$category->id}}">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button title="حذف" type="button" class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#delete_{{$category->id}}">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>

                                                        <div class="modal fade" id="edit_{{$category->id}}" tabindex="-1" role="dialog"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-warning">
                                                                        <h5 class="modal-title" id="exampleModalLabel">تعديل التحصص
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form class="form-horizontal" method="post"
                                                                          action="{{route('editCategory')}}"
                                                                          enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="model_id" value="{{$category->id}}">


                                                                            <div class="form-group row ">
                                                                                <label class="col-lg-12 control-label text-lg-right"
                                                                                       for="textinput"> الاسم </label>
                                                                                <div class="col-lg-12">
                                                                        <textarea class="form-control" name="name"
                                                                                  placeholder="الاسم "
                                                                                  required
                                                                                  >{{$category->name}}</textarea>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="reset" class="btn btn-dark"
                                                                                    data-dismiss="modal">اغلاق
                                                                            </button>
                                                                            <button class="btn btn-warning" type="submit">تعديل
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal animated fadeIn" id="delete_{{$category->id}}" tabindex="-1"
                                                             style="text-align: right"
                                                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger">
                                                                        <h5 class="modal-title" id="exampleModalLabel">حذف القسم
                                                                        </h5>
                                                                        {{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                                                        {{--                                                <span aria-hidden="true">&times;</span>--}}
                                                                        {{--                                            </button>--}}
                                                                    </div>
                                                                    <form method="post" action="{{route('deleteCategory')}}"
                                                                          class="buttons">
                                                                        {{csrf_field()}}
                                                                        <div class="modal-body">
                                                                            <h4>هل انت متأكد ؟</h4>
                                                                            <h6>
                                                                                انت علي وشك الحذف

                                                                            </h6>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <input type="hidden" name="model_id" value="{{$category->id}}">
                                                                            <button class="btn btn-dark" type="button"
                                                                                    data-dismiss="modal">
                                                                                اغلاق
                                                                            </button>
                                                                            <button type="submit" class="btn btn-danger">تأكيد
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                @endforeach
                                                {{--<tbody id="sub_cats_{{$categoryategory->id}}"></tbody>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Container-fluid Ends-->

                </div>
            </div>
        </div>


    </div>

    <div class="modal fade" id="subCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة قسم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal needs-validation was-validated" method="post"
                      action="{{route('categories.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group row ">
                            <label class="col-lg-12 control-label text-lg-right" for="textinput"> الاسم
                                </label>
                            <div class="col-lg-12">
                                <textarea class="form-control" name="name" placeholder="الاسم " required
                                          ></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-dark" data-dismiss="modal">اغلاق</button>
                        <button class="btn btn-success">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).on('change', '#status', function (e) {

            var model_id = $(this).attr('model_id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{URL::route('editCategoryStatus')}}",
                data: {
                    model_id: model_id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    location.reload();
                    if (response.success) {
                        toastr.success(response.success);
                    } else if (response.warning) {
                        toastr.warning(response.warning);
                    } else {
                        toastr.error(response.error);
                    }
                },
                error: function (jqXHR) {
                    toastr.error(jqXHR.responseJSON.message);
                }
            });
        });

    </script>

@endsection
