$(document).ready(function() {

	 $('#product-edit').click(function(e) {

        e.preventDefault();
		
		var id_prod = $('#order-products-wrp table :radio:checked').attr('id_prod');

		if (!id_prod) {alert('Вы не выбрали что редактировать'); return;}
		
        location.href = '/order_product/edit?id_prod=' + id_prod;
        
    });
	
});