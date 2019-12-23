<?php 
namespace App\Http\Controllers;
use App\gender;
use Illuminate\Http\Request;
use File;
class genderCtrl extends Controller{
    function index(){
        $gender= gender::select('id','name','created_at','updated_at')->orderBy('id','DESC')->paginate(10);
        return view('admin/list_gender',[
            'gender'=>$gender
        ]);
    }
    function create(){
      return view('admin/insert_gender');
  }
  function insert(Request $request){
    $controller = new Controller();
    $validatedData = $controller->validatedDataEdit($request);
    if ($validatedData->fails()) {
        
        return $this->create()->withErrors($validatedData)->with([
        'name'=>$request->name
      ]);
        
    }else {
      gender::create([
         'name'=>$request->name,
         'created_at'=>date("Y-m-d H:i:s")
     ]);
      return redirect()->to('administrator/gender');
  }
}
function edit($id)
{if ($id=='') {
    return redirect()->to('administrator/gender');
}else {
    $gender_edit= gender::where('id', $id)->first();
    if ($gender_edit==null) {
        return redirect()->to('administrator/gender');
    }else {

        return view('admin/edit_gender',[
            'gender_edit'=>$gender_edit
        ]);
        
    }
}


}
function update($id, Request $request){
    if ($id=='') {
        return redirect()->to('administrator/gender');
    }else {
        $gender_edit= gender::where('id', $id)->first();
        if ($gender_edit==null) {
            return redirect()->to('administrator/gender');
        }else {
            
         $controller = new Controller();
         $validatedData = $controller->validatedDataEdit($request);
         if ($validatedData->fails()) {
            
            return $this->edit($id)->withErrors($validatedData)->with([
                'name'=>$request->name,
                'status'=>$request->status
            ]);
            
        }else {
            $genderUpdate = gender::where('id',$id);
            $genderUpdate ->update([
                'name'=>$request->name,
                'updated_at'=>date("Y-m-d H:i:s")
            ]);
            return redirect()->to('administrator/gender');
        }
        
    }
}

}
function delete($id)
{if ($id=='') {
    return redirect()->to('administrator/gender');
}else {
    $gender_edit= gender::where('id', $id)->first();
    if ($gender_edit==null) {
        return redirect()->to('administrator/gender');
    }else {

     $gender_deltete= gender::where('id', $id)->delete();
     return redirect()->to('administrator/gender');  
 }
}


}
}
?>