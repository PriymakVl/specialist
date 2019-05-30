$(document).ready(function() {

	$('#order-product-action-delete').click(function() {
	var id_action = $('[name="actions"]:checked').attr('id_action');
	
		if (!id_action) return alert('Вы не выбрали операцию');
		var agree = confirm('Вы действительно хотите удалить указанную операцию?');

		if (agree) location.href = '/order_action/delete?sent=product&id_action=' + id_action;
	});
	
});