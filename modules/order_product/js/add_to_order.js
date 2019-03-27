$(document).ready(function() {

	$('#add-to-order').click(function() {
		var id_prod = $(this).attr('id_prod');
		var qty = prompt('Введите количество');
		if (+qty) location.href = '/order_product/add?id_prod=' + id_prod + '&qty=' + qty; 
		else alert('Вы ввели не число');
	});

});