$(document).ready(function() {

	$('.product-qty').click(function() {
		var qty_old = $(this).text();
		var id_item = $(this).attr('id_item');
		var qty_new = prompt('Введите количество', qty_old);
		
		if (qty_new) location.href = '/order/change_qty_product?id_item=' + id_item + '&qty=' + qty_new;
		else alert('Вы не ввели количество');
	});
	
});