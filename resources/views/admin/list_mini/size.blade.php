<div class="child_select">
	<label for="">Size:</label>
<div class="clearfix" id="size">
	@foreach ($size as $size)
	<div class="check-box">
		<label for="">{{$size->name}}</label>
		<input type="checkbox" name="id_size[]"  
			<?php if (isset($id_category_old)&&$id_category_old!=''&&$id_category_old=$id_category_new) {
				if (isset($list_size)&&$list_size!='') {
					if (in_array($size->id, $list_size)) {
						echo 'checked';
				}
			}
		} elseif (isset($size)) {
			
		}
			?>
		id="id_size"  value="{{$size->id}}">
		
	</div>
	@endforeach()
</div>
<br />
<label for="">Chất liệu:</label>
<div class="clearfix" id="material">
	@foreach($material as $material)
	<div class="check-box">
		<label for="">{{$material->name}}</label>
		<input type="checkbox" <?php if (isset($id_category_old)&&$id_category_old!=''&&$id_category_old=$id_category_new) {
				if (isset($list_material)&&$list_material!='') {
				if (in_array($material->id, $list_material)) {
						echo 'checked';
				}
			}
		}
		?> name="id_material[]" id="id_material" value="{{$material->id}}" class="">
	</div>
	@endforeach()
</div>
</div>