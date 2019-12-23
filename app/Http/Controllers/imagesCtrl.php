<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\images;
class imagesCtrl extends Controller
{
    //
   function delete(Request $request)
    {
    	if (images::where('id_product', $request->id_product)->count()>1) {
    		images::where('id', $request->id)->delete();
    	}else {
    		return 'Không được xoá ảnh duy nhất';
    	}
    	
	}
}