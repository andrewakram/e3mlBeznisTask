<?php

namespace App\Http\Controllers\Eloquent\User;

use App\Http\Controllers\Interfaces\User\AuthRepositoryInterface;
use App\Models\Notification;
use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Str;
//use Nexmo\Laravel\Facade\Nexmo;

class AuthRepository implements AuthRepositoryInterface {

    public function create($request)
    {
        $user = User::create($request->all());
        $tokenResult = $user->createToken('Laravel Personal Access Client')->accessToken;
        $user->access_token = $tokenResult;
        $this->sendSMS($request->type, 'activate',$request->name,$request->email, null);
        return $user;
    }

    public function sendSMS($role,$type,$name,$email,$phone)
    {
        $activation_code = generateActivationCode();

//        $data = [
//            'name' => $name,
//            'subject' => 'هذا هو كود التفعيل في تطبيق task ',
//            'code' => $activation_code
//        ];
//
//
//        Mail::send('activation', $data, function ($message) use ($data,$email) {
//            $message->from('info@task.com','Activation@Task')
//                ->to($email)
//                ->subject('تفعيل الحساب | task');
//        });

        Verification::updateOrcreate
        (
            [
                'phone' => $email,
            ],
            [
                'role' => $role,
                'type' => $type,
                'code' => $activation_code,
                'expire_at' => Carbon::now()->addHour()->toDateTimeString()
            ]
        );
    }

    public function checkIfEmailExist($email)
    {
        return User::whereEmail($email)->first();
    }

    public function checkIfPhoneExist($phone)
    {
         $user = User::wherePhone($phone)->first();
         return $user;
    }

    public function checkJWT($jwt)
    {
        return User::whereJwt($jwt)->select('id','password')->first();
    }

    public function checkId($id)
    {
        return User::whereId($id)->first();
    }

    public function codeCheck($role,$phone,$code)
    {
        return Verification::whereCode($code)
            ->wherePhone($phone)
            ->first();
    }

    public function activeUser($phone)
    {
        $user = $this->checkIfEmailExist($phone);
        $user->active = 1;
        $user->save();
        return $user;
    }

    public function userData($jwt)
    {
        return User::whereJwt($jwt)->first();
    }

    public function editeProfile($user,$request){
//        if ($request->has('email')){
//            if($this->checkIfEmailExist($request->email))
//                return 'email_exist';
//        }
//
//        if ($request->has('phone')){
//            if($this->checkIfPhoneExist($request->phone))
//                return 'phone_exist';
//        }

        $user->update($request->all());
        return $user;
    }

    public function changePassword($user,$request){
        if(isset($request->old_password)){
            if(Hash::make($request->old_password) == $user->password)
                $user->update(['password' => $request->password]);
        }else{
            $user->update(['password' => $request->password]);
        }
        return $user;
    }

}
