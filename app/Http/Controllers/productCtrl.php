<?php 
namespace App\Http\Controllers;
use App\product;
use App\Category;
use App\brand;
use App\gender;
use App\material;
use App\size;
use App\colors;
use Illuminate\Http\Request;
use File;
use View;

class productCtrl extends Controller{
	function create(){
		$category= Category::select('id','name')->paginate();
		$brand= brand::select('id','name')->paginate();
		$gender= gender::select('id','name')->paginate();
		$material= material::select('id','name')->paginate();
		$colors= colors::select('id','name')->paginate();
		return ([
			'category'=>$category,
			'brand'=>$brand,
			'material'=>$material,
			'colors'=>$colors,
			'gender'=>$gender
		]);
	}
	function returnCreat(){
		$data=$this->create();
		return view('admin/insert_product',$data);
	}
	function index(){
		$product= product::select('id','name', 'price', 'id_category', 'id_gender', 'id_brand', 'id_colors','list_size','list_material', 'status', 'sale', 'images', 'description', 'created_at', 'updated_at')->orderBy('id','DESC')->paginate(10);
		return view('admin/list_product',[
			'product'=>$product
		]);
	}
    //
	
	function createSize(Request $request){
		$material=  material::where('id_category', $request->id_category)->paginate();
		$size=  size::where('id_category', $request->id_category)->paginate();
		 if (request()->ajax()) {
		 $id_category=$request->id_category;
        return view('admin.list_mini.size',[
        	'material'=>$material,
        	'size'=>$size
        ]);
    }
 
	}
	
	//
	function insert(Request $request){
		$id_material = $request->input('id_material');
		$id_size = $request->input('id_size');
		$controller = new Controller();
		$data=$this->create();
		$validatedData = $controller->validatedProduct($request);
		if ($validatedData->fails()) {
			return view('admin/insert_product',$data)->withErrors($validatedData)->with(
				[
					'name'=>$request->name,
					'status'=>($request->status),
					'price'=>$request->price,
					'id_category'=>$request->id_category,
					'id_gender'=>$request->id_gender,
					'id_brand'=>$request->id_brand,
					'id_colors'=>$request->id_colors,
					'description'=>$request->description,
				]);
		}else {
			$getImg=$request->file('images');
			$list_material = implode(',', $id_material);
			$list_size = implode(',', $id_size);
			$images=$getImg->getClientOriginalName();
			$destinationPath = public_path('/images');
			$getImg->move($destinationPath, $images);
			if (($request->status)=='') {
				$status=0;
			}
			else {
				$status=1;
			}
			if (($request->sale)=='') {
				$sale=0;
			}
			else {
				$sale=1;
			}
			product::create([
				'name'=>$request->name,
				'price'=>$request->price,
				'id_category'=>$request->id_category,
				'id_gender'=>$request->id_gender,
				'id_brand'=>$request->id_brand,
				'id_colors'=>$request->id_colors,
				'list_size'=>$list_size,
				'list_material'=>$list_material,
				'status'=>$status,
				'sale'=>$sale,
				'images'=>$images,
				'description'=>$request->description,
				'created_at'=>date("Y-m-d H:i:s")
			]);
			return redirect()->to('administrator/product');
		}
	}
	function edit($id)
	{if ($id=='') {
		return redirect()->to('administrator/product');
	}elseif((product::where('id', $id)==null)){
		return redirect()->to('administrator/product');
	}else {
		$data = $this->create();
		$product_edit= product::where('id', $id)->first();
		$material_old=  material::where('id_category', $product_edit->id_category)->paginate();
		$size_old=  size::where('id_category', $product_edit->id_category)->paginate();
		
		$list_size=explode(',', $product_edit->list_size);
		$list_material=explode(',', $product_edit->list_material);
		return view('admin/edit_product',[
			'name_old'=>$product_edit->name,
			'price_old'=>$product_edit->price,
			'id_category_old'=>$product_edit->id_category,
			'id_gender_old'=>$product_edit->id_gender,
			'id_brand_old'=>$product_edit->id_brand,
			'id_colors_old'=>$product_edit->id_colors,
			'sale_old'=>$product_edit->sale,
			'status_old'=>$product_edit->status,
			'description_old'=>$product_edit->description,
			'list_size_old'=>$list_size,
			'list_material_old'=>$list_material,
			'images_old'=>$product_edit->images,
			'material_old'=>$material_old,
			'size_old'=>$size_old

		],$data);
	}
}
function update($id, Request $request)
{if ($id=='') {
	return redirect()->to('administrator/product');
}elseif((product::where('id', $id)==null)){
	return redirect()->to('administrator/product');
}else {
	$controller = new Controller();
	$validatedData = $controller->validatedProductEdit($request);
	if ($validatedData->fails()) {
		return $this->edit($id)->withErrors($validatedData)->with([
			'name'=>$request->name,
			'status'=>($request->status),
			'price'=>$request->price,
			'id_category'=>$request->id_category,
			'id_gender'=>$request->id_gender,
			'id_brand'=>$request->id_brand,
			'id_colors'=>$request->id_colors,
			'sale'=>$request->sale,
			'description'=>$request->description,
		]);
	}else {
		if (($request->status)=='') {
			$status=0;
		}
		else {
			$status=1;
		}
		if (($request->sale)=='') {
			$sale=0;
		}
		else {
			$sale=1;
		}
		$productEdit = product::where('id',$id)->first();
		$productUpdate = product::where('id',$id);
		$list_material = implode(',', $id_material);
		$list_size = implode(',', $id_size);
		if ($request->file('images')=='') {
			$images=$productEdit->images;
		}else {
			$images=$request->file('images')->getClientOriginalName();
			$getImg=$request->file('images');
			$images=$getImg->getClientOriginalName();
			$destinationPath = public_path('/images');
			$getImg->move($destinationPath, $images);
		}
		$productUpdate ->update([
			'name'=>$request->name,
			'price'=>$request->price,
			'id_category'=>$request->id_category,
			'id_gender'=>$request->id_gender,
			'id_brand'=>$request->id_brand,
			'id_colors'=>$request->id_colors,
			'list_size'=>$list_size,
			'list_material'=>$list_material,
			'status'=>$status,
			'sale'=>$sale,
			'images'=>$images,
			'description'=>$request->description,
			'updated_at'=>date("Y-m-d H:i:s")
		]);
		return redirect()->to('administrator/product');
	}
}
}
function delete($id)
{
	$product_deltete= product::where('id', $id)->delete();
	$product= product::select('id','name','status','images','created_at','updated_at')->orderBy('id','DESC')->paginate(10);
	return redirect()->to('administrator/product');
}
}
?>