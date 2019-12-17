<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    //
     protected $table= 'brand';
    protected $fillable= [
    	'id','name','status','images','created_at','updated_at'
    ];
}
