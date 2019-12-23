<?php 
namespace App\Http\Controllers;
use App\product;
use App\Category;
use App\brand;
use App\gender;
use App\material;
use App\size;
use App\colors;
use App\images;
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
		$product= product::all();
		return view('admin/list_product',[
			'product'=>$product
		]);
	}
    //
	
	function createSize(Request $request){
		$material=  material::where('id_category', $request->id_category)->paginate();
		$size=  size::where('id_category', $request->id_category)->paginate();
		if (request()->ajax()) {
			if ($request->id_product!='') {
				$product= product::where('id', $request->id_product)->first();
				$list_size=explode(',', $product->list_size);
				$list_material=explode(',', $product->list_material);
				$data = [
					'list_size'=>$list_size,
					'list_material'=>$list_material,
					'material'=>$material,
					'size'=>$size,
					'id_category_old'=>$product->id_category,
					'id_category_new'=>$request->id_category
				];
			}else {
				$data = [
					'material'=>$material,
					'size'=>$size
				];
			}

			return view('admin.list_mini.size',$data);
		}

	}
	
	//
	function insert(Request $request){
		$id_material = $request->input('id_material');
		$id_size = $request->input('id_size');
		$controller = new Controller();
		$data=[
			'name'=>$request->name,
			'status'=>($request->status),
			'price'=>$request->price,
			'id_category'=>$request->id_category,
			'id_gender'=>$request->id_gender,
			'id_brand'=>$request->id_brand,
			'id_colors'=>$request->id_colors,
			'description'=>$request->description,
		];

		$flag=false;
		$validatedData = $controller->validatedProduct($request);
		if ($validatedData->fails()) {
			return $this->returnCreat()->with($data)->withErrors($validatedData);
		}elseif ($request->hasFile('images')) {
			$destinationPath = public_path('/images');
			$allowedfileExtension=['jpg','png','jpeg'];
			foreach($request->file('images') as $file) {
				$images = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$check=in_array($extension,$allowedfileExtension);
				if($check) {
					$file->move($destinationPath, $images);
					$flag=true;
				}else {
					return $this->returnCreat()->with($data)->withErrors(['images'=>'Chỉ được chọn file định dạng: JPG,JPEG,PNG']);
					$flag=false;
				}
			}
			if ($flag) {
				$list_material = implode(',', $id_material);
				$list_size = implode(',', $id_size);
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
				$product = product::create([
					'name'=>$request->name,
					'price'=>$request->price,
					'id_category'=>$request->id_category,
					'id_gender'=>$request->id_gender,
					'id_brand'=>$request->id_brand,
					'id_colors'=>$request->id_colors,
					'list_size'=>$list_size,
					'list_material'=>$list_material,
					'promotional_price'=>$request->promotional_price,
					'status'=>$status,
					'sale'=>$sale,
					'images'=>'Test',
					'description'=>$request->description,
					'created_at'=>date("Y-m-d H:i:s")
				]);
				foreach ($request->images as $images) {
					$filename = $images->getClientOriginalName();
					images::create([
						'id_product' => $product->id,
						'images' => $filename
					]);
				}
				return redirect()->to('administrator/product');
			} 
		}else {
			return $this->returnCreat()->with($data)->withErrors(['images'=>'Bạn chưa chọn ảnh']);
		}
		
		
	}
	function edit($id)
	{if ($id=='') {
		return redirect()->to('administrator/product');
	}elseif((product::where('id', $id))->count()<1){
		return redirect()->to('administrator/product');
	}else {
		$data = $this->create();
		$product_edit= product::where('id', $id)->first();
		return view('admin/edit_product',[
			'id_product'=>$product_edit->id,
			'name_old'=>$product_edit->name,
			'price_old'=>$product_edit->price,
			'id_category_old'=>$product_edit->id_category,
			'id_gender_old'=>$product_edit->id_gender,
			'id_brand_old'=>$product_edit->id_brand,
			'id_colors_old'=>$product_edit->id_colors,
			'sale_old'=>$product_edit->sale,
			'status_old'=>$product_edit->status,
			'description_old'=>$product_edit->description,
			'images_old'=>$product_edit->images,
			'promotional_price'=>$product_edit->promotional_price


		],$data);
	}
}
function update($id, Request $request)
{$id_material = $request->input('id_material');
$id_size = $request->input('id_size');
$controller = new Controller();
$data=[
	'name'=>$request->name,
	'status'=>($request->status),
	'price'=>$request->price,
	'id_category'=>$request->id_category,
	'id_gender'=>$request->id_gender,
	'id_brand'=>$request->id_brand,
	'id_colors'=>$request->id_colors,
	'description'=>$request->description,
];
$validatedData = $controller->validatedProduct($request);
if ($validatedData->fails()) {
	return $this->returnCreat()->with($data)->withErrors($validatedData);
}else{
	$flag = false;
	if ($request->hasFile('images')) {
		$destinationPath = public_path('/images');
		$allowedfileExtension=['jpg','png','jpeg'];
		foreach($request->file('images') as $file) {
			$images = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			$check=in_array($extension,$allowedfileExtension);
			if($check) {
				$file->move($destinationPath, $images);
				$flag =true;
			}else {
				return $this->returnCreat()->with($data)->withErrors(['images'=>'Chỉ được chọn file định dạng: JPG,JPEG,PNG']);
			}
		}
	}
	$list_material = implode(',', $id_material);
	$list_size = implode(',', $id_size);
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
	$product_edit= product::where('id', $id);
	$product_edit->update([
		'name'=>$request->name,
		'price'=>$request->price,
		'id_category'=>$request->id_category,
		'id_gender'=>$request->id_gender,
		'id_brand'=>$request->id_brand,
		'id_colors'=>$request->id_colors,
		'list_size'=>$list_size,
		'list_material'=>$list_material,
		'promotional_price'=>$request->promotional_price,
		'status'=>$status,
		'sale'=>$sale,
		'images'=>'Test',
		'description'=>$request->description,
		'created_at'=>date("Y-m-d H:i:s")
	]);
	if ($flag) {
	 	foreach ($request->images as $images) {
		$filename = $images->getClientOriginalName();
		images::create([
			'id_product' => $id,
			'images' => $filename
		]);
	}
}
	return redirect()->to('administrator/product');
}


}

function delete($id)
{
	$product_deltete= product::where('id', $id)->delete();
	return redirect()->to('administrator/product');
}
}
?>