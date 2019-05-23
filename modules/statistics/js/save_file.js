$(document).ready(function() {
	$('#save-to-exel-file').click(function() {
		var get = location.search;
		location.href = '/statistics/save_file' + get;
	});
});