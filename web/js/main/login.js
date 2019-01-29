$(document).ready(function () {
	
   $('input[name="submit"]').click(function (event) {
       event.preventDefault();

		var pass = $('#password').val();
		
		if (!pass || pass == 'Пароль') {
			alert("Вы не указали пароль");
			return;
		}
        else location.href = 'main/login?password=' + pass;

   })
});