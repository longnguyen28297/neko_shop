<div class="child_select">
	<label for="">Size:</label>
<div class="clearfix" id="size">
	@foreach ($size as $size)
	<div class="check-box">
		<label for="">{{$size->name}}</label>
		<input type="checkbox" name="id_size[]"  id="id_size"  value="{{$size->id}}" class="">
		<pre>
			<?php print_r($size_old); ?>
		</pre>
	</div>
	@endforeach()
</div>
<br />
<label for="">Chất liệu:</label>
<div class="clearfix" id="material">

	@foreach($material as $material)
	<div class="check-box">
		<label for="">{{$material->name}}</label>
		<input type="checkbox" name="id_material[]" id="id_material" value="{{$material->id}}" class="">
	</div>
	@endforeach()
</div>

</div>