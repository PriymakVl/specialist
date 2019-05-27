$(document).ready(function() {

	$('#actions').change(function() {
		var name = $(this).val();
		var price = $('option:selected', this).attr('price');

		$('input[name="name"]').val(name);
		$('input[name="price"]').val(price);
	});
});