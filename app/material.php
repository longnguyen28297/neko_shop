<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    //
    protected $table= 'material';
    protected $fillable= [
    	'id','name','id_category','created_at','updated_at'
    ];
}
