$(document).ready(function() {
	$('.show-action-note').click(function(event) {
		event.preventDefault();
		var note = $(this).attr('note');
		alert(note);
	});
	
});