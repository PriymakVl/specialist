$(document).ready(function() {

    $('#content_delete').click(function(e) {

        e.preventDefault();

        var id_order = $(this).attr('id_order');
		
		var items = $('#order-content-wrp :checkbox:checked');

		if (items.length == 0) {alert('Вы не выбрали что удалить'); return;}
		
		var ids = '';
		for (var i = 0; i < items.length; i++) {
			var id = items[i].getAttribute('id_prod');
			var ids = ids + id + ',';
		}
		
		var ids = ids.slice(0, -1);
		
		var agree = confirm('Вы действительно хотите удалить выбранные позиции');

        if (agree) location.href = '/order/delete_content?id_order=' + id_order + '&ids=' + ids;
        
    });

});