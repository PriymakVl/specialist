$(document).ready(function() {
	$('#add-to-order-all').click(function() {
		var id_prod = $(this).attr('id_prod');
		var qty = prompt('Введите количество');
		if (+qty) location.href = '/order_product/add_base?id_prod=' + id_prod + '&qty=' + qty; 
		else alert('Вы ввели не число');
	});

	$('#add-to-order-unit').click(function() {
		var id_prod = $(this).attr('id_prod');
		var qty = prompt('Введите количество');
		if (+qty) location.href = '/order_product/add_base?id_prod=' + id_prod + '&qty=' + qty + '&unit_flag=yes'; 
		else alert('Вы ввели не число');
	});

});