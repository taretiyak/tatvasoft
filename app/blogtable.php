<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogtable extends Model
{
    protected $table="blogs";
// description: this function is for get blog data
    public static function getBlog($id=''){
        if($id==''){
           $blog=blogtable::all();
        }else{
            $blog=blogtable::where('user_id','=',$id)->get();
        }
        return $blog;
    }
}
