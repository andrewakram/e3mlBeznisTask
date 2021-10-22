@foreach($courses as $course)
    <div class="col-lg-4" style="border:solid 1px gainsboro;margin-bottom: 5px">
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
