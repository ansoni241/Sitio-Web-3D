<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo mensaje de contacto</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #FFD700; /* Un dorado elegante */
            margin-bottom: 20px;
        }
        p {
            margin: 10px 0;
        }
        strong {
            color: #FFD700;
        }
        .container {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Solicitud de Contactar</h2>
        <p><strong>Nombre:</strong> {{ $name }} {{ $lastname }}</p>
        <p><strong>Correo electrónico:</strong> {{ $email }}</p>
        <p><strong>Asunto:</strong> {{ $affair }}</p>
        <p>{{ $mensaje }}</p>
    </div>
</body>
</html>
