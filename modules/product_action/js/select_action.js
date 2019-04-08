$(document).ready(function() {

	$('#actions').change(function() {
		var name = $(this).val();
		var price = $('option:selected', this).attr('price');
		console.log(price);
		$('input[name="name"]').val(name);
		$('input[name="price"]').val(price);
	});
});