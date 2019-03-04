$(document).ready(function() {

	//add name and symbol product
	$('select[name="id_prod"]').change(function() {
		var id_prod = $(this).val();

		if (id_prod) {
			var prod_name = $('option:selected', this).attr('prod_name');
			var prod_symbol = $('option:selected', this).attr('prod_symbol');
			$('input[name="prod_symbol"]').val(prod_symbol).prop('readonly', true);
			$('input[name="prod_name"]').val(prod_name).prop('readonly', true);
		}
		else {
			$('input[name="prod_symbol"]').val('').prop('readonly', false);
			$('input[name="prod_name"]').val('').prop('readonly', false);
		}
	});
	
	//add action name
	$('select[name="id_action"]').change(function() {
		var id_action = $(this).val();

		if (id_action) {
			var action_name = $('option:selected', this).attr('action_name');
			$('input[name="action_name"]').val(action_name).prop('readonly', true);;
		}
		else {
			$('input[name="action_name"]').val('').prop('readonly', false);
		}
	});
	
	//delete order action unplan
	$('#order-action-unplan-delete').click(function() {
	
	var id_action_unplan = $('[name="actions_unplan"]:checked').attr('id_action');
	
		if (!id_action_unplan) return alert('Вы не выбрали внеплановую операцию');
		var agree = confirm('Вы действительно хотите удалить указанную операцию?');
		var id_order = $(this).attr('id_order');

		if (agree) location.href = '/order_action/delete?id_action_unplan=' + id_action_unplan + '&id_order=' + id_order;
	});
	
	
	//edit order action unplan
	$('#order-action-unplan-edit').click(function() {
		var id_action_unplan = $('[name="actions_unplan"]:checked').attr('id_action');
		if (!id_action_unplan) return alert('Вы не выбрали операцию');
		var id_order = $(this).attr('id_order');
		location.href = '/order_action/edit_unplan?id_action_unplan=' + id_action_unplan + '&id_order=' + id_order;
	});

});