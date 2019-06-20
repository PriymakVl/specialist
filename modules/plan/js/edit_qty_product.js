$(document).ready(function() {

   //product
	$('.prod-qty').click(function(event) {
		event.preventDefault();
		var id_prod = $(this).attr('id_prod');
		var qty = prompt('Укажите количество');
		if (+qty) location.href = '/order_product/edit_quantity?id_prod=' + id_prod + '&qty=' + qty;
		else alert('Вы указали количество неверно');
	});

});