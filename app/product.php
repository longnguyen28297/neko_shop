<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $table= 'product';
    protected $fillable= [
    	'id','name', 'price', 'id_category', 'id_gender', 'id_brand', 'id_colors', 'status', 'sale', 'images', 'description', 'created_at', 'updated_at','list_size','list_material'
    ];
}
