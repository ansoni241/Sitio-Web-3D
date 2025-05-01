<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{$title ?? ''}} | Industrias Patzi </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon.ico') }}">
    <meta name="description" content=" {{$metaDescription ?? 'Default meta description'}}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Incluye SweetAlert y jQuery (si aún no están incluidos) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
    <!-- En colocar en platalla completo una imagen -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    {{-- Para realizar la animacion de las imagenes --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- ICON Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style type="text/css">
        #mapContainer{top: 0; right: 0; bottom: 0; left: 0; position: absolute !important;}
    </style>
    @vite(['resources/css/app.scss','resources/js/app.js'])
    @vite(['resources/css/normalize.css'])
</head>
<x-layouts.navigation/>
<x-layouts.topbar/>
<body style="background-image: url('{{ asset('images/fondo.webp') }}'); background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center center;">

<script>
    @if(Session::has('status'))
        Swal.fire({
            title: "{{ Session::get('status') }}",
            icon: "success"
        });
    @endif
    @if(Session::has('errorcontact'))
        Swal.fire({
            title: "{{ Session::get('errorcontact') }}",
            icon: "question"
        });
    @endif
</script>
 {{$slot}} {{-- es su esquivalente al yield --}}


<!-- Vendor Start -->
<div class="container mt-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                @charts
                    <a href="{{ asset('storage/chart/' . $chart->file) }}" data-fancybox="images">
                        <div class="bg-light p-4 image-container">
                            <img src="{{ asset('storage/chart/' . $chart->file) }}" alt="" class="img-fluid">
                        </div>
                    </a>
                @endcharts
            </div>
        </div>
    </div>
</div>

<!-- Vendor End -->

 <!-- Añade los scripts de jQuery (si aún no los tienes) y Owl Carousel -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

 <!-- Script para inicializar Owl Carousel -->
 <script>
     $(document).ready(function(){
         $('.owl-carousel').owlCarousel({
             loop: true,
             margin: 10,
             nav: true,
             autoplay: true,
            autoplayTimeout: 3000,// Duración en milisegundos antes de pasar al siguiente ítem
             responsive: {
                 0: {
                     items: 1
                 },
                 600: {
                     items: 3
                 },
                 1000: {
                     items: 5
                 }
             }
         });
     });
 </script>

 <!-- Estilo adicional para las imágenes -->
 <style>
     .image-container img {
         max-width: 100%;
         height: auto;
     }
 </style>
<x-layouts.footer/>
{{-- back to top --}}

<a href="#" class="btn btn-danger back-to-top"><i class="fa fa-angle-double-up"></i></a>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<div class="social-bubble-container">
    <!-- El input -->
    <input type="checkbox" id="social-btn-more" style="display: none;">
    <div class="social-bubble-links">
        @redsocial
            @if($redsocial->redsocial === 'facebook')
                <a href="{{ $redsocial->url }}" target="_blank" class="fab fa-facebook-f"></a>
            @elseif($redsocial->redsocial === 'youtube')
                <a href="{{ $redsocial->url }}" target="_blank" class="fab fa-youtube"></a>
            @elseif($redsocial->redsocial === 'tiktok')
                <a href="{{ $redsocial->url }}" target="_blank" class="fab fa-tiktok"></a>
            @elseif($redsocial->redsocial === 'instagram')
                <a href="{{ $redsocial->url }}" target="_blank" class="fab fa-instagram"></a>
            @endif
        @endredsocial
    </div>
    <div class="social-bubble-button">
        <label for="social-btn-more" class="fa fa-plus"></label>
    </div>
</div>
<!-- Al final del body -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

{{-- Inicio de las animaciones --}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
