<?php 
namespace App\Http\Controllers;
use App\UserAdmin;
use App\level;
use App\validate;
use Auth;
use Illuminate\Http\Request;
use File;
use Validator;
class adminCtrl extends Controller{
	function index(){
		return view('admin/home');
	}
	function list(){
		$admin= UserAdmin::select('id','name','phone_num','email', 'password','level','images','created_at','updated_at')->orderBy('id','DESC')->paginate(10);
		return view('admin/list_admin',[
			'admin'=>$admin
		]);
	}
	function create(){
		$level= level::select('id','name')->orderBy('id','DESC')->paginate(10);
		return view('admin/insert_admin',[
			'level'=>$level
		]);
	}
	function insert(Request $request){
		$controller = new Controller();
		$validatedData = $controller->validatedData($request);
		if ($validatedData->fails()) {
			
			return View('admin/insert_admin',[
				'name'=>$request->name,
				'status'=>($request->status)
			])->withErrors($validatedData);
				
		}else {
			$images=$request->file('images')->getClientOriginalName();
			UserAdmin::create([
				'name'=>$request->name,
				'phone_num'=>$request->phone,
				'email'=>$request->email,
				'password'=>bcrypt($request->password),
				'level'=>$request->id_level,
				'images'=>$images,
				'created_at'=>date("Y-m-d H:i:s")
			]);
			return redirect()->to('administrator/admin');
		}
		
	}
	function edit($id)
	{if ($id=='') {
		$admin= UserAdmin::select('id','name','status','images','created_at','updated_at')->orderBy('id','DESC')->paginate(10);
    	return view('admin/list_admin',[
    		'admin'=>$admin
    	]);
	}else {
		$admin_edit= UserAdmin::where('id', $id)->first();
    	return view('admin/edit_admin',[
    		'admin_edit'=>$admin_edit
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
		$adminEdit = UserAdmin::where('id',$id)->first();
		$adminUpdate = UserAdmin::where('id',$id);
		if ($request->file('images')=='') {
			$images=$adminEdit->images;
		}else {
			$images=$request->file('images')->getClientOriginalName();
		}
		$adminUpdate ->update([
			'name'=>$request->name,
			'status'=>$status,
			'images'=>$images,
			'updated_at'=>date("Y-m-d H:i:s")
		]);
		return redirect()->to('administrator/admin');
	}
}
	function delete($id)
	{
		$admin_deltete= UserAdmin::where('id', $id)->delete();
    	return redirect()->to('administrator/admin');
	}

}
?>