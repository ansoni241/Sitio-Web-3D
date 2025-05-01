<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo de Confirmación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            text-align: left;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .content a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .content a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            {{-- <img src="{{ asset('images/perfil.png') }}" alt="Logo"> --}}
            <img src="https://industriaspatzi.com/images/perfil.png" alt="Logo">
        </div>
        <div class="content">
            <p>Hola, {{ $name }}:</p>
            <p>Gracias por ponerte en contacto con nosotros. Por favor, haz clic en el siguiente enlace para verificar tu correo electrónico:</p>
            <a href="{{ url('/verify-email/'.$token) }}">Verificar correo electrónico</a>
        </div>
    </div>
</body>
</html>
