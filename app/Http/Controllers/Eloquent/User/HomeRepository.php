<?php
/**
 * Created by PhpStorm.
 * User: Al Mohands
 * Date: 22/05/2019
 * Time: 01:53 م
 */

namespace App\Http\Controllers\Eloquent\User;


use App\Http\Controllers\Interfaces\User\HomeRepositoryInterface;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use DB;

class HomeRepository implements HomeRepositoryInterface
{
    public $model;

    public function __construct()
    {
//        $this->model = $model;
    }

    public function categoriesCourses($request)
    {
        return Category::whereActive(1)
            ->with(['courses' => function($q){
                $q->whereActive(1);
            }])->get();
    }

}
