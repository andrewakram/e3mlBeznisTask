<?php

namespace App\Http\Controllers;

use App\Models\AppExplanation;

use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Group;
use App\Models\Notification;

use App\Models\Specialist;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::count();
        $courses = Course::count();
        return view('cp.home',compact('categories','courses'));
    }

    public function homePage(Request $request)
    {
        $categories = Category::whereActive(1)->get();
        $courses = Course::whereActive(1)->paginate(10);
        if ($request->ajax()) {
            $view = view('data',compact('courses'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('welcome',compact('categories','courses'));
    }

    public function filterCourses(Request $request)
    {
        $search_key = $request->search_key;
        $category_id = $request->category_id;
        $rate_value = $request->rate_value;
        $levels = isset($request->levels) ? $request->levels : ['beginner', 'immediat', 'high'];
        $time = $request->time;
//
        $builder = Course::whereActive(1);
        if ($search_key) {
            $builder->where('name','like','%'.$search_key.'%');
        }
        if ($category_id) {
            $builder->where('category_id',$category_id);
        }
        if ($rate_value) {
            $builder->where('rate',$rate_value);
        }
        if ($levels) {
            $builder->whereIn('levels',(array)$levels);
        }
        if ($time) {
            if($time == 1){
                $builder->where('hours','<',4);
            }
            if($time == 2){
                $builder->where('hours','<',8);
            }
            if($time == 3){
                $builder->where('hours','>',8);
            }

        }

        $courses = $builder->orderBy('id','desc')->paginate(10);
        return response()->json([
            'courses' => $courses,
        ]);

    }
}
