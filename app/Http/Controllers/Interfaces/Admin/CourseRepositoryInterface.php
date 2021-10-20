<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/13/2019
 * Time: 8:08 PM
 */

namespace App\Http\Controllers\Interfaces\Admin;


interface CourseRepositoryInterface
{
    public function index();
    public function storeCourse($attributes);
    public function editCourse($attributes);
    public function editCourseStatus($attributes);
    public function deleteCourse($attributes);

}
