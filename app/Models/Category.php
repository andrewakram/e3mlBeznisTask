<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = "categories";
    protected $fillable = [
        'active','name'
    ];
    protected $hidden = [
        'created_at','updated_at','deleted_at'
    ];

    public function courses(){
        return $this->hasMany(Course::class,"category_id");
    }
}
