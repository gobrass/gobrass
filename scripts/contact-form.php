<?php
 
/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$number = htmlspecialchars($_POST["number"]);
$message = htmlspecialchars($_POST["message"]);
$bezspama = htmlspecialchars($_POST["bezspama"]);
 
/* Ваш адрес и тема сообщения */
$address = "papri9@mail.ru";
$sub = "Gobrass.ru cообщение с сайта";
 
/* Формат письма */
$mes = "Сообщение с сайта Gobrass.ru.\n
Имя отправителя: $name \n
Электронный адрес отправителя: $email\n
Телефон отправителя: $number\n
Текст сообщения:\n
$message";
 
 
if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $name <$email> \r\n Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
 header('Refresh: 5; URL=http://gobrass.ru/');
 echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо отправлено, через 5 секунд вы вернетесь на главную страницу</body>';}
else {
 header('Refresh: 5; URL=http://gobrass.ru/');
 echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо не отправлено, через 5 секунд вы вернетесь на главную страницу</body>';}
}
exit; /* Выход без сообщения, если поле bezspama заполнено спам ботами */
?>