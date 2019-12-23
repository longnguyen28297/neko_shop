<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    //
    protected $table= 'images';
    protected $fillable= [
    	'id','id_product','images','created_at','updated_at'
    ];
}
