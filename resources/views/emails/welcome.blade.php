<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Welcome Email</title>
</head>
 
<body>
<h2>Bem vindo {{$user['userName']}}! Obrigado por se registrar.</h2>
<br/>
Por favor confirme seu cadastro clicando<a href="{{ url('/home/confirmRegister') . '/' . $user['email_confirmation']}}"> aqui </a>
</body>
 
</html>