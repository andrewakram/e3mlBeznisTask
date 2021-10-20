<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Interfaces\Admin\CategoryRepositoryInterface;
use App\Http\Controllers\Interfaces\Admin\CourseRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class CourseController extends Controller
{
    protected $courseRepository;
    protected $categoryRepository;
    public function __construct(CourseRepositoryInterface $courseRepository,CategoryRepositoryInterface $categoryRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->index();

        $courses = $this->courseRepository->index();
        return view('cp.courses.index',compact('courses','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $this->courseRepository->storeCourse($request);
        return back()->with('success','تمت العملية بنجاح');
    }


    public function editCourse(Request $request){
        $this->validate($request,[
            'name' => 'required',
        ]);
        $this->courseRepository->editCourse($request);
        return back()->with('success','City updated successfully');
    }

    public function editCourseStatus(Request $request)
    {
        $this->validate($request,[
            'model_id' => 'required',
        ]);
        $this->courseRepository->editCourseStatus($request);
        return back()->with('success','تمت العملية بنجاح');
    }

    public function deleteCourse(Request $request)
    {
        $this->validate($request,[
            'model_id' => 'required',
        ]);
        $this->courseRepository->deleteCourse($request);
        return back()->with('success','تمت العملية بنجاح');
    }

}
