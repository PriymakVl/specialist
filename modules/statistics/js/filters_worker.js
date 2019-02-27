$(document).ready(function() {
	
	$('#state-order-action').change(function() {
		var state = $(this).val();
		var request = getObjectGetParams();
		location.href = '/statistics/worker?id_worker=' + request.id_worker +'&state=' + state;
	});
});

function getObjectGetParams()
{
    var search = window.location.search.substr(1),
    params = {};
    if (search == '') return false;   
    search.split('&').forEach(function(item) {
        item = item.split('=');
        params[item[0]] = item[1];
    });
    return params;
}