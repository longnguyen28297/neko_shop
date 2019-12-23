<?php 
namespace App\Http\Controllers;
use App\brand;
use App\validate;
use Illuminate\Http\Request;
use File;
use Validator;
class brandCtrl extends Controller{

	function index(){
		$brand= brand::select('id','name','status','images','created_at','updated_at')->orderBy('id','DESC')->paginate();
		return view('admin/list_brand',[
			'brand'=>$brand
		]);
	}
	function create(){
		return view('admin/insert_brand');
	}
	function insert(Request $request){
		$controller = new Controller();
		$validatedData = $controller->validatedData($request);
		if ($validatedData->fails()) {
			
			return $this->create()->with([
				'name'=>$request->name,
				'status'=>($request->status)
			])->withErrors($validatedData);
				
		}else {
			$images=$request->file('images')->getClientOriginalName();
			if (($request->status)=='') {
				$status=0;
			}
			else {
				$status=1;
			}
			brand::create([
				'name'=>$request->name,
				'status'=>$status,
				'images'=>$images,
				'created_at'=>date("Y-m-d H:i:s")
			]);
			return redirect()->to('administrator/brand');
		}
		
	}
	function edit($id)
	{if ($id=='') {
		return redirect()->to('administrator/brand');
	}elseif((brand::where('id', $id))->count()<1){
		return redirect()->to('administrator/brand');
	}else {
		$brand_edit= brand::where('id', $id)->first();
    	return view('admin/edit_brand',[
    		'brand_edit'=>$brand_edit
    	]);
	}
		

	}
	function update($id, Request $request){
		if ($id=='') {
		return redirect()->to('administrator/brand');
	}elseif((brand::where('id', $id))->count()<1){
		return redirect()->to('administrator/brand');
	}else {
		$controller = new Controller();
		$validatedData = $controller->validatedDataEdit($request);
		if ($validatedData->fails()) {
			
			return $this->edit($id)->withErrors($validatedData)->with([
				'name'=>$request->name,
				'status'=>$request->status
			]);
				
		}else {
		if (($request->status)=='') {
			$status=0;
		}
		else {
			$status=1;
		}
		$brandEdit = brand::where('id',$id)->first();
		$brandUpdate = brand::where('id',$id);
		if ($request->file('images')=='') {
			$images=$brandEdit->images;
		}else {
			$images=$request->file('images')->getClientOriginalName();
		}
		$brandUpdate ->update([
			'name'=>$request->name,
			'status'=>$status,
			'images'=>$images,
			'updated_at'=>date("Y-m-d H:i:s")
		]);
		return redirect()->to('administrator/brand');
	}
}
}
	function delete($id)
	{
		$brand_deltete= brand::where('id', $id)->delete();
    	return redirect()->to('administrator/brand');
	}

}
?>