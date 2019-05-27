$(document).ready(function() {

	$('#add-product-position').click(function() {
		var id_position = $(this).attr('id_position');
		var name = prompt('Введите название продукта');
		location.href = '/order_product/add_position?id_position=' + id_position + '&name=' + name; 
		return false;
	});

});