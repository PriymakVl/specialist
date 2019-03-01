$(document).ready(function() {

	//add name and symbol product
	$('select[name="id_prod"]').change(function() {
		var id_prod = $(this).val();

		if (id_prod) {
			var prod_name = $('option:selected', this).attr('prod_name');
			var prod_symbol = $('option:selected', this).attr('prod_symbol');
			$('input[name="prod_symbol"]').val(prod_name).prop('readonly', true);
			$('input[name="prod_name"]').val(prod_symbol).prop('readonly', true);
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

});