$(document).ready(function() {

	//edit order action unplan
	$('#order-action-unplan-edit').click(function() {
		var id_action = $('[name="actions_unplan"]:checked').attr('id_action');
		if (!id_action) return alert('Вы не выбрали операцию');
		var id_order = $(this).attr('id_order');
		location.href = '/order_action/edit_unplan?id_action=' + id_action + '&id_order=' + id_order;
	});
});