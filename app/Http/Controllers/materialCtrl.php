<?php 
namespace App\Http\Controllers;
use App\material;
use App\Category;
use Illuminate\Http\Request;
use File;
class materialCtrl extends Controller{
    function index(){
        $material= material::select('id','name','id_category','created_at','updated_at')->orderBy('id','DESC')->paginate(10);
        return view('admin/list_material',[
            'material'=>$material
        ]);
    }
    function create(){
      $category= Category::all();
      return view('admin/insert_material',['category'=>$category]);
  }
  function insert(Request $request){
    $controller = new Controller();
    $validatedData = $controller->validatedDataEdit($request);
    if ($validatedData->fails()) {
        
        return $this->create()->withErrors($validatedData)->with([
        'name'=>$request->name,
        'id_category'=>$request->id_category
      ]);
        
    }else {
      material::create([
         'name'=>$request->name,
         'id_category'=>$request->id_category,
         'created_at'=>date("Y-m-d H:i:s")
     ]);
      return redirect()->to('administrator/material');
  }
}
function edit($id)
{if ($id=='') {
    return redirect()->to('administrator/material');
}else {
    $material_edit= material::where('id', $id)->first();
    if ($material_edit==null) {
        return redirect()->to('administrator/material');
    }else {
        $category= Category::all();
        return view('admin/edit_material',[
            'material_edit'=>$material_edit,
            'category'=>$category
        ]);
        
    }
}


}
function update($id, Request $request){
    if ($id=='') {
        return redirect()->to('administrator/material');
    }else {
        $material_edit= material::where('id', $id)->first();
        if ($material_edit==null) {
            return redirect()->to('administrator/material');
        }else {
            
         $controller = new Controller();
         $validatedData = $controller->validatedDataEdit($request);
         if ($validatedData->fails()) {
            
            return $this->edit($id)->withErrors($validatedData)->with([
                'name'=>$request->name,
                'status'=>$request->status
            ]);
            
        }else {
            $materialUpdate = material::where('id',$id);
            $materialUpdate ->update([
                'name'=>$request->name,
                'id_category'=>$request->id_category,
                'updated_at'=>date("Y-m-d H:i:s")
            ]);
            return redirect()->to('administrator/material');
        }
        
    }
}

}
function delete($id)
{if ($id=='') {
    return redirect()->to('administrator/material');
}else {
    $material_edit= material::where('id', $id)->first();
    if ($material_edit==null) {
        return redirect()->to('administrator/material');
    }else {

     $material_deltete= material::where('id', $id)->delete();
     return redirect()->to('administrator/material');  
 }
}


}
}
?>