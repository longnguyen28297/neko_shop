 function del_cate() {
 	if(!confirm("Bạn có chắc chắn muốn xóa danh mục và tất cả sản phẩm nằm trong danh mục này"))
 		event.preventDefault();
 }
 function del_brand() {
 	if(!confirm("Bạn có chắc chắn muốn xóa thương hiệu và tất cả sản phẩm nằm trong thương hiệu này"))
 		event.preventDefault();
 }
function del_product() {
 	if(!confirm("Bạn có chắc chắn muốn xóa sản phẩm này"))
 		event.preventDefault();
 }
 function loadSize() {
		// body...
		token = $('#token').val();
		id_category = $('#id_category').val();
		id_product = $('#id_product').val();
		if (id_category=='') {
			
		}else{
			$.post('./administrator/createSize', {'id_category': id_category, 'id_product': id_product, '_token':token}, function(data, textStatus, xhr) {
                /*optional stuff to do after success */
                $("#size").html(data);
                });
		}
}
function loadSale(){
	if ($('#sale').is(":checked"))
{
 	$('#value_sale').removeClass('d-none');
}else{
	$('#value_sale').addClass('d-none');
}
	
}
function loadStatus(){
	if ($('#status').is(":checked"))
{
 	$('#status_value').html('Hiển thị');
}else{
	$('#status_value').html('Ẩn');
}
	
}
window.onload = function()
{
    loadSize();
    loadSale();
    loadStatus();
}
function del_img_product(id) {
	// body...
	token = $('#token').val();
		id_product = $('#id_product').val();
		pathname =$(location).attr('pathname');
		if (id=='') {
			
		}else{
			$.post('./administrator/delImgProduct', {'id': id, 'id_product': id_product, '_token':token}, function(data, textStatus, xhr) {
                /*optional stuff to do after success */
            $("#list_img").load("./administrator/editProduct/"+id_product+" #list_img");
            $("#images_del").html(data);
                });
		}
}


