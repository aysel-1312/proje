<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;




class Blogs extends Model
{
    //use HasFactory;

    public function getCategory()
    {

        return $this->hasOne('App\Models\Category','id','category_id');
    }

}
