<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Support\Facades\DB;



class Category extends Model
{
    public function blogsCount(){

        return $this->hasMany('App\Models\Blogs','category_id','id')->count();
        /**  Bağlanacağımız model --  bağlanacağımız sütun-- Bağlanacak id */

    }
}
