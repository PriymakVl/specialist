<?php
	//$login_error = isset($_GET['login_error']) ? $_GET['login_error'] : '';
 ?>
<!--<H1 class="firmname">Specialist</H1>-->
<form method="post" action="/main/login" class="login">
	<p id="login-input-wrp">
		<? if ($message->class == 'message-login'): ?>
			<span id="error-message-login"><?=$message->text;?></span>
		<? endif; ?>
		<label for="login">Логин:</label>
	  <input type="text" name="login" id="login" required value="<?=$get->login_error?>">
	</p>

	<p id="password-input-wrp">
		<label for="password">Пароль:</label>
		<input type="password" name="password" id="password" required>
		<? if ($message->class == 'message-password'): ?>
			<span id="error-message-password"><?=$message->text;?></span>
		<? endif; ?>
	</p>

	<p class="login-submit">
	  <button type="submit" class="login-button" name="save" value="save">Войти</button>
	</p>

</form>