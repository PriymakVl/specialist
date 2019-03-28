$(document).ready(function() {

    $('#product-delete').click(function(e) {

        e.preventDefault();
		
		var id_prod = $('#order-products-wrp table :radio:checked').attr('id_prod');

		if (!id_prod) {alert('Вы не выбрали что удалить'); return;}
		
		var agree = confirm('Вы действительно хотите удалить?');

        if (agree) location.href = '/order_product/delete?id_prod=' + id_prod;
        
    });

});