<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = [
         'role','type', 'phone', 'code', 'expire_at'
    ];

    //role >> 1=>user ,2=>shop ,3=>branch ,4=>waiter, 5=>delegate
    public $timestamps = false;
}
