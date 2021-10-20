<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Auth\Authenticatable as AuthenticableTrait;
//use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
//use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
//    use HasRoles;

    public $guard_name = 'admin';

    protected $fillable = [
        'jwt',
        'type','shop_id','title',
        'active','name','email','phone','password','image'
    ];

    protected $hidden = [
        'password'
    ];



    public function setImageAttribute($value)
    {
        $img_name = time().uniqid().'.jpg';
        $value->move(public_path('/uploads/admin/images/'),$img_name);
        $this->attributes['image'] = $img_name ;
    }

    public function getImageAttribute($value)
    {
        if($value && $value!=null)
        {
            return asset('/uploads/admin/images/'.$value);
        }else{
            return asset('/uploads/admin/default.png');
        }
    }

    public function setPasswordAttribute($value)
    {
        if(isset($value))
            $this->attributes['password'] = Hash::make($value) ;
        else
            $this->attributes['password'] = Hash::make('123456') ;
    }
}
