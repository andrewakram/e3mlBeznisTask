<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Interfaces\User\AuthRepositoryInterface;
use App\Models\Country;
use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function phoneCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => failed(), 'msg' => $validator->messages()->first()]);
        }

        if ($this->authRepository->checkIfPhoneExist($request->phone)) {
            return response()->json(msg($request, success(), 'phone_checked'));
        }
        return response()->json(msg($request, failed(), 'phone_not_exist'));

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:6',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => failed(), 'msg' => $validator->messages()->first()]);
        }

        if($this->authRepository->checkIfEmailExist($request->email))
            return response()->json(msg($request, failed(), 'email_exist'));

//        if($this->authRepository->checkIfPhoneExist($request->phone))
//            return response()->json(msg($request, failed(), 'phone_exist'));

        $user = $this->authRepository->create($request);
        //$user->code = Verification::orderBy("id",'desc')->wherePhone($user->email)->select('code')->first()->code;

        if($user)
            return response()->json(msgdata($request, success(), 'register_success',$user));
    }

    public function codeSend(Request $request)
    {
        $validator = Validator::make($request->all(), [
//            'role' => 'required|in:user,company',
//            'type' => 'required|in:activate,reset',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'msg' => $validator->messages()->first()]);
        }

        if ($data = $this->authRepository->checkIfEmailExist($request->email)) {
            $this->authRepository->sendSMS(0, "reset", "$data->name","$request->email",null);

            return response()->json(msg($request, success(), 'code_sent'));
        }

        return response()->json(msg($request, failed(), 'email_not_exist'));
    }

    public function codeCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => failed(), 'msg' => $validator->messages()->first()]);
        }

        $check = $this->authRepository->codeCheck('user', $request->email, $request->code);
        if ($check) {
            if (Carbon::now()->format('Y-m-d H') > Carbon::parse($check->expire_at)->format('Y-m-d H')) {
                return response()->json(msg($request, failed(), 'code_expire'));
            } else {
                $user = $this->authRepository->checkIfEmailExist($request->email);

                if ($check->type == 'activate') {
                    $this->authRepository->activeUser($user->email);
                } else {
                    if($user->active == 0)
                        $this->authRepository->activeUser($user->email);
                }
                $tokenResult = $user->createToken('Laravel Personal Access Client')->accessToken;
                $user->access_token = $tokenResult;
                return response()->json(msgdata($request, success(), 'activated', $user));
            }
        } else {
            return response()->json(msg($request, failed(), 'invalid_code'));
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'token' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => failed(), 'msg' => $validator->messages()->first()]);
        }

        $user = $this->authRepository->checkIfEmailExist($request->email);
        if ($user) {
            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'suspend' => 0
            ])) {

                if ($user->active == 0) {
                    return response()->json(msg($request, not_active(), 'not_active'));
                }
                $user->token = $request->token;
                $user->save();
                $user=$request->user();
                $tokenResult = $user->createToken('Laravel Personal Access Client')->accessToken;
//                $token = $tokenResult->token;
                $user->access_token = $tokenResult;
                return response()->json(msgdata($request, success(), 'logged_in', $user));
            }
            else return response()->json(msg($request, failed(), 'invalid_login_data'));
        } else return response()->json(msg($request, failed(), 'invalid_login_data'));
    }

    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => failed(), 'msg' => $validator->messages()->first()]);
        }

        $user = $this->authRepository->checkId($request->user_id);
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(msg($request, success(), 'password_changed'));
        }
        return response()->json(msg($request, failed(), 'invalid_data'));
    }

    public function updateProfile(Request $request)
    {
        if ($userData = checkJWT()) {
            $user = $this->authRepository->editeProfile($userData, $request);
//            if ($user == 'email_exist')
//                return response()->json(msg($request, failed(), 'email_exist'));
//            if ($user == 'phone_exist')
//                return response()->json(msg($request, failed(), 'phone_exist'));

            if ($user) {
                $tokenResult = $user->createToken('Laravel Personal Access Client')->accessToken;
//                $token = $tokenResult->token;
                $user->access_token = $tokenResult;
                return response()->json(msgdata($request, success(), 'success', $user));
            }
        } else return response()->json(msg($request, not_authoize(), 'invalid_data'));
    }

    public function changePassword(Request $request)
    {
        if ($userData = checkJWT()) {
            $user = $this->authRepository->changePassword($userData, $request);

            if ($user) {
//                $tokenResult = $user->createToken('Laravel Personal Access Client')->accessToken;
////                $token = $tokenResult->token;
//                $user->access_token = $tokenResult;
                return response()->json(msgdata($request, success(), 'success', $user));
            }
            return response()->json(msg($request, failed(), 'wrong_password'));
        } else return response()->json(msg($request, not_authoize(), 'invalid_data'));
    }

    public function logout(Request $request)
    {
        //dd(Auth::guard('api')->check());
        $user = Auth::guard('api')->user();
        if($user)
            $user->token()->revoke();
        return response()->json(msg($request, success(), 'success'));
    }

    public function profileData(Request $request)
    {
        //dd(Auth::guard('api')->check());
        $user = Auth::guard('api')->user();
        if($user){
//            $tokenResult = $user->accessToken;
//                $token = $tokenResult->token;
            $user->access_token = "";
            $user->country = Country::whereId($user->country_id)
                ->select('id','name_'.getLang().' as name','currency_'.getLang().' as currency','time_zone')
                ->first();
            $user->user_country = Country::whereId($user->user_country_id)
                ->select('id','name_'.getLang().' as name','currency_'.getLang().' as currency','time_zone')
                ->first();
            unset($user->country_id,$user->user_country_id);
            return response()->json(msgdata($request, success(), 'success',$user));
        }
        return response()->json(msg($request, not_authoize(), 'failed'));
    }

    public function checkSocial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => '',
            'phone' => 'numeric|unique:users',
            'token' => 'required',
            'email' => 'unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => failed(), 'msg' => $validator->messages()->first()]);
        }

        if ($request->has('social_id')) {
            $user = User::where('social_id', $request->social_id)
                ->first();
            if ($user) {
                return response()->json(msgdata($request, success(), 'logged_in', $user));
            }else{
                global $social_id;//social_id
                $social_id = $request->provider_id;
                $user = User::create(array_merge($request->all(),['user_country_id' => $request->country_id]));
                $tokenResult = $user->createToken('Laravel Personal Access Client')->accessToken;
                $user->access_token = $tokenResult;

                return response()->json(msgdata($request, success(), 'logged_in', $user));

            }
        }
        return response()->json(msg($request, failed(), 'user_not_found'));
    }

    public function changePhone(Request $request)
    {
        $user = User::whereId($request->user_id)->first();
        if($user){
            if($user->active == 0){
                User::whereId($request->user_id)->update(["phone" => $request->phone]);
                return response()->json(msg($request, success(), 'success'));
            }else{
                return response()->json(msg($request, failed(), 'already_active'));
            }
        }
        return response()->json(msg($request, failed(), 'user_not_found'));
    }
}
