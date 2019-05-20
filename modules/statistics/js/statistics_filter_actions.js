$(document).ready(function() {
	//actions
	$('#statistics-filter-actions').change(function() {
		var action = $(this).val();
		var request_str = getRequestString(action);
		console.log(request_str); return;
		location.href = request_str;
	});
	
});


function getRequestString(action) {
	var params = getObjectGetParams();
	var request = '/statistics/worker?id_worker=' + params.id_worker;
	if (params.period_start && params.period_end) request += '&period_start=' + params.period_start + '&period_end=' + params.period_end;
	if (action) request += '&action=' + action;
	return request;
}