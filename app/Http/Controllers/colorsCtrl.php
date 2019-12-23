<?php 
namespace App\Http\Controllers;
use App\colors;
use Illuminate\Http\Request;
use File;
class colorsCtrl extends Controller{
    function index(){
    	$colors= colors::select('id','name','created_at','updated_at')->orderBy('id','DESC')->paginate();
    	return view('admin/list_colors',[
    		'colors'=>$colors
    	]);
    }
    function create(){
      return view('admin/insert_colors');
  }
  function insert(Request $request){
    $controller = new Controller();
    $validatedData = $controller->validatedDataEdit($request);
    if ($validatedData->fails()) {
        
        return $this->create()->withErrors($validatedData)->with([
        'name'=>$request->name
      ]);
        
    }else {
      colors::create([
         'name'=>$request->name,
         'created_at'=>date("Y-m-d H:i:s")
     ]);
      return redirect()->to('administrator/colors');
  }
}
function edit($id)
{if ($id=='') {
    return redirect()->to('administrator/colors');
}else {
    $colors_edit= colors::where('id', $id)->first();
    if ($colors_edit==null) {
        return redirect()->to('administrator/colors');
    }else {

        return view('admin/edit_colors',[
            'colors_edit'=>$colors_edit
        ]);
        
    }
}


}
function update($id, Request $request){
    if ($id=='') {
        return redirect()->to('administrator/colors');
    }else {
        $colors_edit= colors::where('id', $id)->first();
        if ($colors_edit==null) {
            return redirect()->to('administrator/colors');
        }else {
            
         $controller = new Controller();
         $validatedData = $controller->validatedDataEdit($request);
         if ($validatedData->fails()) {
            
            return $this->edit($id)->withErrors($validatedData)->with([
                'name'=>$request->name,
                'status'=>$request->status
            ]);
            
        }else {
            $colorsUpdate = colors::where('id',$id);
            $colorsUpdate ->update([
                'name'=>$request->name,
                'updated_at'=>date("Y-m-d H:i:s")
            ]);
            return redirect()->to('administrator/colors');
        }
        
    }
}

}
function delete($id)
{if ($id=='') {
    return redirect()->to('administrator/colors');
}else {
    $colors_edit= colors::where('id', $id)->first();
    if ($colors_edit==null) {
        return redirect()->to('administrator/colors');
    }else {

     $colors_deltete= colors::where('id', $id)->delete();
     return redirect()->to('administrator/colors');  
 }
}


}
}
?>