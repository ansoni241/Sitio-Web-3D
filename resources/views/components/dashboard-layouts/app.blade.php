<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{$title ?? ''}} </title>
    <meta name="description" content=" {{$metaDescription ?? 'Default meta description'}}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome (iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    @vite(['resources/css/app.scss','resources/js/app.js'])
    @vite(['resources/css/normalize.css'])
</head>
<body class="font-sans antialiased">
    <!-- Incluye el navbar horizontal -->
    <div class="min-h-screen bg-gray-100">
        {{-- <x-dashboard-layouts.navigation/> --}}
        <x-dashboard-layouts.navigations/>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

</body>
</html>
