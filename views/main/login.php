<!-- css -->
<link rel="stylesheet" href="/web/css/login.css">

<div id="login-form">
    <img src="/web/images/logo.png" id="logo">
    <h1>Авторизация</h1>
    <fieldset>
        <form>
            <input type="text" id="password"  required value="Пароль" onBlur="if(this.value=='')this.value='Пароль'" onFocus="if(this.value=='Пароль')this.value='' ">
            <input type="submit" name="submit" value="ВОЙТИ">
        </form>
    </fieldset>
</div>

<!-- js files -->
<script src="/web/js/main/login.js"></script>