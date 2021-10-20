<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/13/2019
 * Time: 8:07 PM
 */

namespace App\Http\Controllers\Eloquent\Admin;


use App\Http\Controllers\Interfaces\Admin\CategoryRepositoryInterface;
use App\Models\Category;
use App\Models\CityCategory;
use App\Models\City;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function index()
    {
        return Category::get();
    }

    public function storeCategory($request)
    {
        return Category::create($request->all());
    }

    public function editCategory($request)
    {
        return Category::where('id', $request->model_id)->update($request->except('_token','model_id'));
    }

    public function editCategoryStatus($request)
    {
        $porduct=Category::where("id",$request->model_id)->first();
        if($porduct->active == 1){
            return Category::where("id",$request->model_id)
                ->update(["active" => 0 ]);
        }else{
            return Category::where("id",$request->model_id)
                ->update(["active" => 1 ]);
        }
    }

    public function deleteCategory($request)
    {
        return Category::where('id', $request->model_id)->delete();
    }

}
