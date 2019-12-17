 function del_cate() {
 	if(!confirm("Bạn có chắc chắn muốn xóa danh mục và tất cả sản phẩm nằm trong danh mục này"))
 		event.preventDefault();
 }
 function del_brand() {
 	if(!confirm("Bạn có chắc chắn muốn xóa thương hiệu và tất cả sản phẩm nằm trong thương hiệu này"))
 		event.preventDefault();
 }

 function loadSize() {
		// body...
		token = $('#token').val();
		id_category = $('#id_category').val();
		if (id_category=='') {
			
		}else{
			$.post('./administrator/createSize', {'id_category': id_category, '_token':token}, function(data, textStatus, xhr) {
                /*optional stuff to do after success */
                $("#size").html(data);
                });
		}
}

window.onload = function()
{
    reLoadSize();
};
 
function reLoadSize()
{
   token = $('#token').val();
		id_category = $('#id_category').val();
		if (id_category=='') {
			
		}else{
			$.post('./administrator/createSize', {'id_category': id_category, '_token':token}, function(data, textStatus, xhr) {
                /*optional stuff to do after success */
                $("#size").html(data);
                });
		}
}
