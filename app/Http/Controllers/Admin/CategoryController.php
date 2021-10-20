<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Interfaces\Admin\CategoryRepositoryInterface;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
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
        return view('cp.categories.index',compact('categories'));

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
        $this->categoryRepository->storeCategory($request);
        return back()->with('success','تمت العملية بنجاح');
    }


    public function editCategory(Request $request){
        $this->validate($request,[
            'name' => 'required',
        ]);
        $this->categoryRepository->editCategory($request);
        return back()->with('success','City updated successfully');
    }

    public function editCategoryStatus(Request $request)
    {
        $this->validate($request,[
            'model_id' => 'required',
        ]);
        $this->categoryRepository->editCategoryStatus($request);
        return back()->with('success','تمت العملية بنجاح');
    }

    public function deleteCategory(Request $request)
    {
        $this->validate($request,[
            'model_id' => 'required',
        ]);
        $this->categoryRepository->deleteCategory($request);
        return back()->with('success','تمت العملية بنجاح');
    }

}
