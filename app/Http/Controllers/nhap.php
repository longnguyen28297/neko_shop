function edit($id)
	{if ($id=='') {
		return redirect()->to('administrator/product');
	}else {
		$product_edit= product::where('id', $id)->first();
    	return view('admin/edit_product',[
    		'product_edit'=>$product_edit
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
		$productEdit = product::where('id',$id)->first();
		$productUpdate = product::where('id',$id);
		if ($request->file('images')=='') {
			$images=$productEdit->images;
		}else {
			$images=$request->file('images')->getClientOriginalName();
		}
		$productUpdate ->update([
			'name'=>$request->name,
			'status'=>$status,
			'images'=>$images,
			'updated_at'=>date("Y-m-d H:i:s")
		]);
		return redirect()->to('administrator/product');
	}
}
	function delete($id)
	{
		$product_deltete= product::where('id', $id)->delete();
		$product= product::select('id','name','status','images','created_at','updated_at')->orderBy('id','DESC')->paginate(10);
    	return redirect()->to('administrator/product');
	}