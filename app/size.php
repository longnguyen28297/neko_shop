<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    //
    protected $table= 'size';
    protected $fillable= [
    	'id','name','id_category','created_at','updated_at'
    ];
}
