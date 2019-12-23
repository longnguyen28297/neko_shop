<?php 
namespace App\Http\Controllers;
use App\size;
use App\Category;
use Illuminate\Http\Request;
use File;

class sizeCtrl extends Controller{
    function index(){
        $size= size::all();
        return view('admin/list_size',[
            'size'=>$size
        ]);
    }
    function create(){
      $category= Category::all();
      return $category;
  }
  function new()
  {
    $category = $this->create();
     return view('admin/insert_size',[
            'category'=>$category
        ]);
  }
  function insert(Request $request){
    $controller = new Controller();
    $validatedData = $controller->validatedDataEdit($request);
    if ($validatedData->fails()) {
     return $this->new()->withErrors($validatedData)->with([
        'name'=>$request->name,
        'id_category'=>$request->id_category
     ]);
        
    }else {
      size::create([
         'name'=>$request->name,
         'id_category'=>$request->id_category,
         'created_at'=>date("Y-m-d H:i:s")
     ]);
      return redirect()->to('administrator/size');
  }
}
function edit($id)
{if ($id=='') {
    return redirect()->to('administrator/size');
}else {
    $size_edit= size::where('id', $id)->first();
    if ($size_edit==null) {
        return redirect()->to('administrator/size');
    }else {
        $category= Category::all();
        return view('admin/edit_size',[
            'size_edit'=>$size_edit,
            'category'=>$category
        ]);
        
    }
}


}
function update($id, Request $request){
    if ($id=='') {
        return redirect()->to('administrator/size');
    }else {
        $size_edit= size::where('id', $id)->first();
        if ($size_edit==null) {
            return redirect()->to('administrator/size');
        }else {
            
         $controller = new Controller();
         $validatedData = $controller->validatedDataEdit($request);
         if ($validatedData->fails()) {
            
            return $this->edit($id)->withErrors($validatedData)->with([
                'name'=>$request->name,
                'id_category'=>$request->id_category
            ]);
            
        }else {
            $sizeUpdate = size::where('id',$id);
            $sizeUpdate ->update([
                'name'=>$request->name,
                'id_category'=>$request->id_category,
                'updated_at'=>date("Y-m-d H:i:s")
            ]);
            return redirect()->to('administrator/size');
        }
        
    }
}

}
function delete($id)
{if ($id=='') {
    return redirect()->to('administrator/size');
}else {
    $size_edit= size::where('id', $id)->first();
    if ($size_edit==null) {
        return redirect()->to('administrator/size');
    }else {

     $size_deltete= size::where('id', $id)->delete();
     return redirect()->to('administrator/size');  
 }
}


}
}
?>