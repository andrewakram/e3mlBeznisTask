<?php

namespace App\Http\Controllers\Api\User;


use App\Http\Controllers\Interfaces\User\HomeRepositoryInterface;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    protected $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function categoriesCourses(Request $request)
    {
        $userData = checkJWT();
        if(isset($userData)){
            $results = $this->homeRepository->categoriesCourses($request);
            return response()->json(msgdata($request,success(),'success',$results));
        }
        return response()->json(msg($request, not_authoize(), 'invalid_data'));
    }

}
