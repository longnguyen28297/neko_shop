<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gender extends Model
{
    //

     protected $table= 'gender';
    protected $fillable= [
    	'id','name','created_at','updated_at'
    ];


}
