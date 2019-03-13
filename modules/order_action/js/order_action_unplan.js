$(document).ready(function() {

	//add name and symbol product
	$('select[name="product"]').change(function() {
		var prod_name = $('option:selected', this).attr('prod_name');
		var prod_symbol = $('option:selected', this).attr('prod_symbol');
		$('input[name="prod_symbol"]').val(prod_symbol);
		$('input[name="prod_name"]').val(prod_name);
	});
	
	//add action name
	$('select[name="action"]').change(function() {
		var action_name = $('option:selected', this).attr('action_name');
		$('input[name="action_name"]').val(action_name);
	});


});