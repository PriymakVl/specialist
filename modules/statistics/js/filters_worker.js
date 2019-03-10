$(document).ready(function() {
	
	const ACTION_STATE_ENDED = 4;
	const ACTION_STATE_PLANED = 1;
	
	$('#state-order-action').change(function() {
		var state = $(this).val();
		if (state == ACTION_STATE_ENDED) {
			$('#period-plan-action').hide(); /***/ $('#period-fact-action').show();
		} else {
			$('#period-fact-action').hide(); /***/ $('#period-plan-action').show();
		}
	});
	
	$().click(function() {
		var state = $('#state-order-action').val();
		var request = getObjectGetParams();
		var period_start = $('input[name="period_start"]').val();
		var period_end = $('input[name="period_end"]').val();
		if (state == ACTION_STATE_ENDED) location.href = '/statistics/worker_made?id_worker=' + request.id_worker + '&period_start=' + period_start + '&period_end=' + period_end;
		else location.href = '/statistics/worker_plan?id_worker=' + request.id_worker;
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