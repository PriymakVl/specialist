$(document).ready(function() {
	$('.product-action-delete').click(function(event) {
		event.preventDefault();
		var id_action = $(this).attr('id_action');

		var agree = confirm ('Вы действительно хотите удалить операцию?');

		if (agree) location.href = '/product_action/delete?id=' + id_action;
	});
});