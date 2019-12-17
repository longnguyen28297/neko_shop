<?php 
namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use File;

class categoryCtrl extends Controller{
    function index(){
    	$category= Category::select('id','name','status','images','created_at','updated_at')->orderBy('id','DESC')->paginate(10);
    	return view('admin/list_category',[
    		'category'=>$category
    	]);
    }
    function create(){
		return view('admin/insert_category');
	}
	function insert(Request $request){
		$controller = new Controller();
		$validatedData = $controller->validatedData($request);
		if ($validatedData->fails()) {
			
			return View('admin/insert_category',[
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
		Category::create([
			'name'=>$request->name,
			'status'=>$status,
			'images'=>$images,
			'created_at'=>date("Y-m-d H:i:s")
		]);
		return redirect()->to('administrator/category');
	}
	}
	function edit($id)
	{if ($id=='') {
		return redirect()->to('administrator/category');
	}else {
		$category_edit= Category::where('id', $id)->first();
    	return view('admin/edit_category',[
    		'category_edit'=>$category_edit
    	]);
	}
		

	}
	function update($id, Request $request){
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
		$categoryEdit = Category::where('id',$id)->first();
		$categoryUpdate = Category::where('id',$id);
		if ($request->file('images')=='') {
			$images=$categoryEdit->images;
		}else {
			$images=$request->file('images')->getClientOriginalName();
		}
		$categoryUpdate ->update([
			'name'=>$request->name,
			'status'=>$status,
			'images'=>$images,
			'updated_at'=>date("Y-m-d H:i:s")
		]);
		return redirect()->to('administrator/category');
	}
}
	function delete($id)
	{
		$category_deltete= Category::where('id', $id)->delete();
		$category= Category::select('id','name','status','images','created_at','updated_at')->orderBy('id','DESC')->paginate(10);
    	return redirect()->to('administrator/category');
	}
    
}


?>