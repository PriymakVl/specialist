$(document).ready(function() {
	//product
	$('.product-rating').click(function() {
		var id_prod = $(this).attr('id_prod');
		var rating = prompt('Укажите новый рейтинг');
		if (+rating) location.href = '/plan/edit_rating?id_prod=' + id_prod + '&rating=' + rating;
		else alert('Вы указали рейтинг неверно');
	});
	
	//order
	$('.order-rating').click(function() {
		var id_order = $(this).attr('id_order');
		var rating = prompt('Укажите новый рейтинг');
		if (+rating) location.href = '/plan/edit_rating?id_order=' + id_order + '&rating=' + rating;
		else alert('Вы указали рейтинг неверно');
	});
	
	//action
	$('.action-rating').click(function() {
		var id_action = $(this).attr('id_action');
		var rating = prompt('Укажите новый рейтинг');
		if (+rating) location.href = '/plan/edit_rating?id_prod=' + id_action + '&rating=' + rating;
		else alert('Вы указали рейтинг неверно');
	});
});