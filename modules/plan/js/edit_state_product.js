$(document).ready(function() {
	const STATE_PLANED = 1;
	const STATE_WAITING = 5;
	const STATE_ENDED = 4;

	$('#product-to-work').click(function(event) {
		event.preventDefault();
		sentRequestProduct(STATE_PLANED);
	});
	
	$('#product-to-waiting').click(function(event) {
		event.preventDefault();
		sentRequestProduct(STATE_WAITING);
	});
	
	$('#product-to-ended').click(function(event) {
		event.preventDefault();
		sentRequestProduct(STATE_ENDED);
	});
});

function sentRequestProduct($state)
{
	var id_prod = $('#plan-products-wrp :radio:checked').attr('id_prod');
	if (!id_prod) {
		alert('Вы не выбрали продукт');
		return;
	}
	var params = getObjectGetParams();
	location.href = '/plan/edit_state?id_prod=' + id_prod + '&state=' + $state + '&type_order=' + params.type_order;
}