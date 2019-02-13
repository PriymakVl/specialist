$(document).ready(function() {

	$('.product-qty').click(function() {
		var qty_old = $(this).text();
		var id_order = $(this).attr('id_order');
		var id_prod = $(this).attr('id_prod');
		var qty_new = prompt('Введите количество', qty_old);
		
		if (qty_new) location.href = '/order/change_qty_product?id_order=' + id_order + '&id_prod=' + id_prod + '&qty=' + qty_new;
		else alert('Вы не ввели количество');
	});
	
});