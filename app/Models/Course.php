<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $table = "courses";
    protected $fillable = [
        'category_id','active',
        'name','description',
        'rate','views',
        'hours','levels',
    ];
    protected $hidden = [
        'created_at','updated_at','deleted_at'
    ];

    public function category(){
        return $this->belongsTo(Category::class,"category_id");
    }


}
