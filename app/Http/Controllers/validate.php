<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use File;
use Validator;
class validated extends Controller{

	function validatedData($request){
		$validatedData =  Validator::make(
			$request->all(),
			[
				'name_brand' => 'required|max:255',
				'images' => 'required|mimes:jpg,jpeg,png,gif'
			],

			[
				'required' => ':attribute không được để trống',
				'min' => ':attribute không được nhỏ hơn :min',
				'max' => ':attribute không được lớn hơn :max',
				'mimes' => ':attribute chỉ được chọn file dạng: jpg,jpeg,png,gif',
			],

			[
				'name_brand' => 'Tiêu đề',
				'images'=>'Ảnh'
			]);

		
		
	}
}
?>