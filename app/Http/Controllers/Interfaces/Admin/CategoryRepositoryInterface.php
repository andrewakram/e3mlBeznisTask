<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/13/2019
 * Time: 8:08 PM
 */

namespace App\Http\Controllers\Interfaces\Admin;


interface CategoryRepositoryInterface
{
    public function index();
    public function storeCategory($attributes);
    public function editCategory($attributes);
    public function editCategoryStatus($attributes);
    public function deleteCategory($attributes);

}
