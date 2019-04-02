$(document).ready(function() {

    $('#product-delete').click(function(e) {

        e.preventDefault();
		
		var id_prod = $(this).attr('id_prod');
		
		var agree = confirm('Вы действительно хотите удалить?');

        if (agree) location.href = '/order_product/delete?id_prod=' + id_prod;
        
    });

});