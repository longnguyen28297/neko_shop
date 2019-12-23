<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\validate;
use Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function validatedData($request){
		$validatedData =  Validator::make(
			$request->all(),
			[
				'name' => 'bail|required|max:255',
				'images' => 'required|image',
				'phone'=>'bail|sometimes|required|numeric',
				'id_category'=>'bail|required|sometimes',
				'email'=>'bail|sometimes|email|required'
			],

			[
				'required' => ':attribute không được để trống',
				'min' => ':attribute không được nhỏ hơn :min',
				'max' => ':attribute không được lớn hơn :max',
				'mimes' => ':attribute chỉ được chọn file dạng: jpg,jpeg,png,gif',
				'numeric'=>':attribute chỉ có thể là số',
				'email'=> 'Nhập đúng định dạng email. VD:abc@gmail.com',
				'image'=>':attribute chỉ được chọn các file ảnh'
			],

			[
				'name' => 'Tên',
				'images'=>'Ảnh',
				'phone'=>'Số điện thoại',
				'id_category'=>'Danh mục'
			]);

		return $validatedData;
		
	}
	function validatedDataEdit($request){
		$validatedData =  Validator::make(
			$request->all(),
			[
				'name' => 'bail|required|max:255',
				'images' => 'image',
				'phone'=>'bail|sometimes|required|numeric',
				'email'=>'bail|sometimes|email|required',
				'id_category'=>'bail|required|sometimes',
			],

			[
				'required' => ':attribute không được để trống',
				'min' => ':attribute không được nhỏ hơn :min',
				'max' => ':attribute không được lớn hơn :max',
				'mimes' => ':attribute chỉ được chọn file dạng: jpg,jpeg,png,gif',
				'numeric'=>':attribute chỉ có thể là số',
				'email'=> 'Nhập đúng định dạng email. VD:abc@gmail.com',
				'image'=>':attribute chỉ được chọn các file ảnh'
			],

			[
				'name' => 'Tên',
				'images'=>'Ảnh',
				'phone'=>'Số điện thoại',
				'id_category'=>'Danh mục'

			]);

		return $validatedData;
		
	}

function validatedProduct($request){
		$validatedData =  Validator::make(
			$request->all(),
			[
				'name' => 'bail|required|max:255',
				'price'=>'bail|required|numeric|min:1|max:2147483647|',
				'id_category'=>'bail|required',
				'id_brand'=>'bail|required',
				'id_size'=>'bail|required',
				'id_gender'=>'bail|required',
				'id_material'=>'bail|required',
				'id_colors'=>'bail|required',
				'description'=>'bail|nullable|max:5000',
				'promotional_price'=>'bail|numeric|min:1|max:2147483647|nullable',
			],

			[
				'required' => ':attribute không được để trống',
				'min' => ':attribute không được nhỏ hơn :min',
				'max' => ':attribute không được lớn hơn :max',
				'mimes' => ':attribute chỉ được chọn file dạng: jpg,jpeg,png,gif',
				'numeric'=>':attribute chỉ có thể là số',
				'email'=> 'Nhập đúng định dạng email. VD:abc@gmail.com',
				'image'=>':attribute chỉ được chọn các file ảnh',
				'id_category.required'=>'Bạn chưa chọn :attribute',
				'id_colors.required'=>'Bạn chưa chọn :attribute',
				'id_brand.required'=>'Bạn chưa chọn :attribute',
				'id_size.required'=>'Bạn chưa chọn :attribute',
				'id_gender.required'=>'Bạn chưa chọn :attribute',
				'id_material.required'=>'Bạn chưa chọn :attribute',
			],

			[
				'name' => 'Tên',
				'images'=>'Ảnh',
				'price'=>'Giá',
				'id_category'=>'danh mục',
				'id_brand'=>'thương hiệu',
				'id_size'=>'size',
				'id_gender'=>'giới tính',
				'id_material'=>'chất liệu',
				'id_colors'=>'màu sắc',
				'description'=>'Mô tả',
				'phone'=>'Số điện thoại',
				'promotional_price'=>'Giá khuyến mại'
			]);

		return $validatedData;
		
	}
	
}
