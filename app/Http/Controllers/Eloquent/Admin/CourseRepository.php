<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/13/2019
 * Time: 8:07 PM
 */

namespace App\Http\Controllers\Eloquent\Admin;


use App\Http\Controllers\Interfaces\Admin\CourseRepositoryInterface;
use App\Models\Course;

class CourseRepository implements CourseRepositoryInterface
{
    public function index()
    {
        return Course::get();
    }

    public function storeCourse($request)
    {
        return Course::create($request->all());
    }

    public function editCourse($request)
    {
        return Course::where('id', $request->model_id)->update($request->except('_token','model_id'));
    }

    public function editCourseStatus($request)
    {
        $porduct=Course::where("id",$request->model_id)->first();
        if($porduct->active == 1){
            return Course::where("id",$request->model_id)
                ->update(["active" => 0 ]);
        }else{
            return Course::where("id",$request->model_id)
                ->update(["active" => 1 ]);
        }
    }

    public function deleteCourse($request)
    {
        return Course::where('id', $request->model_id)->delete();
    }

}
