$(document).ready(function() {

	$('.delete-dwg').click(function() {
		
		var agree = confirm('Вы действительно хотите удалить чертеж?');
		var id_dwg = $(this).attr('id_dwg');
		var id_prod = $(this).attr('id_prod');
		if (agree) location.href = '/drawing/delete?id_dwg=' + id_dwg + '&id_prod=' + id_prod;
	});

});