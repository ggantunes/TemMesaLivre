<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Welcome Email</title>
</head>
 
<body>
<h2>Bem vindo {{$user['name']}}! Obrigado por se registrar.</h2>
<br/>
Ir para o <a href="http://mesalivre.test/home"> site </a>
</body>
 
</html>