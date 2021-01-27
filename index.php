<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">

</head>
<body>

<nav>
    <a href="game.html">Крестики нолики</a><br>
    <a href="" id="link-auth">Вход в личный кабинет</a>
    <a href="" id="link-reg">Регистрация</a>
</nav>

<form action="" method="POST" id="form-auth">
    <div>Введите email и пароль для входа:</div>
    <input id="auth-email" type="email" placeholder="email">
    <input id="auth-pass" type="password" placeholder="password">
    <input type="submit" value="Отправить" id="btn-auth">
    <div id="warning" class="red">Введите все данные</div>
    <div id="wrong" class="red">Введите все данные</div>
</form>

<form action="" method="POST" id="form-reg">
    <div>Введите имя, email и пароль для регистрации:</div>
    <input id="reg-name" type="text" placeholder="name">
    <input id="reg-email" type="email" placeholder="email">
    <input id="reg-pass" type="password" placeholder="password">
    <input type="submit" value="Отправить" id="btn-reg">
    <div id="warning" class="red">Введите все данные</div>
</form>
<div id="result_form"></div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="js/ajax.js"></script>
<script src="js/main.js"></script>
</body>
</html>