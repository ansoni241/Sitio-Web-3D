<x-layouts.app title="Inicio" meta-Description="home meta descripcion">

    <br>
    <br>
    {{-- Cuadro de presenta HOME --}}
    <div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.981);">
        <div class="row align-items-center">
            <!-- Cuadro de presentación de imágenes -->
            <div class="col-md-6 position-relative rounded-lg overflow-hidden"
                style="overflow: hidden;"
                onmouseover="mostrarFlechas(true)"
                onmouseout="mostrarFlechas(false)">
                <img class="w-100" id="imagen-presentacion" src="{{ asset('images/presentacion/Pres1.webp') }}" alt="Image">
                <div class="botones-navegacion" style="position: absolute; top: 50%; left: 0; transform: translateY(-50%);">
                    <button class="btn btn-danger flecha-izquierda" onclick="cambiarImagen(-1)"><</button>
                </div>
                <div class="botones-navegacion" style="position: absolute; top: 50%; right: 0; transform: translateY(-50%);">
                    <button class="btn btn-danger flecha-derecha" onclick="cambiarImagen(1)">></button>
                </div>
            </div>
            <!-- Contenido a la derecha -->
            <div class="col-md-6">
                <div class="text-center text-white">
                    <h2 class="text-2xl font-bold mb-4">LO QUE NOS HACE DIFERENTE</h2>
                    <p id="texto-dinamico" class="text-lg"></p>
                    <a href="{{ route('store') }}" class="btn btn-outline-danger btn-hover-orange" style="position: relative;">
                        <span style="margin-right: 5px;">Nuevos Productos</span>
                        <i class="bi bi-arrow-right" style="color: #cb4819;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- END cuadro HOME --}}
    <br>
    <div class="container py-4">
        <div class="row custom-row-cols row-cols-1 row-cols-md-2 row-cols-lg-4 g-2">
            <div data-aos="flip-right" class="col custom-col">
                <div class="card text-center custom-card" style="width: 250px;">
                    <div class="mod-img">
                        <a href="{{ asset('images/logros/certificadoPatzi.webp') }}" data-fancybox="images">
                            <img class="card-img-top mb-3 cursor-pointer" loading="lazy" src="{{ asset('images/logros/certificadoPatzi.webp') }}" alt="Icon 1">
                        </a>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title fw-bold text-zinc-900 dark:text-white">Certificación internacional</h3>
                    </div>
                </div>
            </div>
            <div data-aos="flip-right" class="col custom-col">
                <div class="card text-center custom-card" style="width: 250px;">
                    <div class="mod-img">
                        <a href="{{ asset('images/logros/productos_calidad.webp') }}" data-fancybox="images">
                            <img class="card-img-top mb-3 cursor-pointer" loading="lazy" src="{{ asset('images/logros/productos_calidad.webp') }}" alt="Icon 1">
                        </a>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title fw-bold text-zinc-900 dark:text-white">Productos calidad</h3>
                    </div>
                </div>
            </div>
            <div data-aos="flip-right" class="col custom-col">
                <div class="card text-center custom-card" style="width: 250px;">
                    <div class="mod-img">
                        <a href="{{ asset('images/logros/asesoramos.webp') }}" data-fancybox="images">
                            <img class="card-img-top mb-3 cursor-pointer" loading="lazy" src="{{ asset('images/logros/asesoramos.webp') }}" alt="Icon 1">
                        </a>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title fw-bold text-zinc-900 dark:text-white">Te asesoramos en tu obra</h3>
                    </div>
                </div>
            </div>
            <div data-aos="flip-right" class="col custom-col">
                <div class="card text-center custom-card" style="width: 250px;">
                    <div class="mod-img">
                        <a href="{{ asset('images/logros/angelestimes.webp') }}" data-fancybox="images">
                            <img class="card-img-top mb-3 cursor-pointer" loading="lazy" src="{{ asset('images/logros/angelestimes.webp') }}" alt="Icon 1">
                        </a>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title fw-bold text-zinc-900 dark:text-white">Entrevista internacional</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
{{-- Cuadro de presentación de imágenes con Slick Carousel --}}
    <div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.981);">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="text-center text-white">
                    <h2 data-aos="flip-right" class="text-2xl font-bold mb-4" style="color: red;">¡Mantente Informado con Nuestras Últimas Noticias!</h2>
                    <p data-aos="flip-right" class="text-lg">Descubre las noticias más recientes sobre nuestros productos, eventos y novedades.</p>
                    <a href="{{ route('news') }}" data-aos="flip-right" class="btn btn-outline-danger btn-hover-orange" style="position: relative;">
                        <span style="margin-right: 5px;">Nuevas Noticias</span>
                        <i class="bi bi-arrow-right" style="color: #cb4819;"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="slider">
                    <!-- Envuelve todas las imágenes en un solo contenedor -->
                    <div data-aos="flip-right"><img class="w-100" src="{{ asset('images/presentacion/Noticias1.webp') }}" alt="Image"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Agrega jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Agrega Slick Carousel JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script>
        $(document).ready(function(){
            // Espera a que todas las imágenes se carguen completamente
            $('.slider').imagesLoaded(function(){
                // Inicializa el slider
                $('.slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000, // Velocidad de cambio en milisegundos
                    arrows: true, // Muestra flechas de navegación
                    dots: true // Muestra indicadores de puntos
                });
            });
        });
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    {{-- Scrip Cuadro de HOME --}}
    <script>
        var imagenes = [
            '{{ asset("images/presentacion/Pres1.webp") }}',
            '{{ asset("images/presentacion/Pres2.webp") }}',
            '{{ asset("images/presentacion/Pres3.webp") }}'
            // Agrega más imágenes según sea necesario
        ];

        var imagenPresentacion = document.getElementById('imagen-presentacion');
        var botonesNavegacion = document.querySelectorAll('.botones-navegacion');
        var indiceImagen = 0;

        function cambiarImagen(delta) {
            indiceImagen += delta;
            if (indiceImagen < 0) {
                indiceImagen = imagenes.length - 1;
            } else if (indiceImagen >= imagenes.length) {
                indiceImagen = 0;
            }
            imagenPresentacion.src = imagenes[indiceImagen];
        }

        function mostrarFlechas(mostrar) {
            if (mostrar) {
                botonesNavegacion.forEach(function(flecha) {
                    flecha.style.display = 'block';
                });
            } else {
                botonesNavegacion.forEach(function(flecha) {
                    flecha.style.display = 'none';
                });
            }
        }

        setInterval(function() {
            cambiarImagen(1);
        }, 5000);
    </script>

    <style>
        .botones-navegacion button {
            font-size: 20px;
            position: relative;
        }
    </style>
    {{-- END Scrip Cuadro de HOME --}}
    {{-- Button Para ir a productos --}}
    <style>
        .btn-hover-orange {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            margin-right: 0.5rem;
            overflow: hidden;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 0.375rem;
            background-color: transparent;
            background-image: linear-gradient(to bottom right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0));
            border: 2px solid #cb4819;
            color: #FB923C;
            transition: background-color 0.2s, color 0.2s;
        }

        .btn-hover-orange:hover {
            background-color: #FB923C;
            color: white;
        }

    </style>
    {{-- END Button Para ir a productos --}}
    {{-- Para actualizar el año de fundacion --}}
    <script>
        // Obtener el año actual
        var añoActual = new Date().getFullYear();

        // Calcular la diferencia entre el año actual y 1987
        var diferenciaAños = añoActual - 1987;

        // Actualizar el texto dinámicamente
        var textoDinamico = document.getElementById('texto-dinamico');
        textoDinamico.textContent = "Estamos comprometidos a proporcionar la mejor calidad absoluta a todos y cada uno de nuestros clientes. Durante los últimos " + diferenciaAños + " años, INDUSTRIAS PATZI ha entregado los mejores ladrillos, hemos seguido creciendo al mismo tiempo que nos mantenemos fieles a nuestra misión original: brindarle a usted, el cliente, un servicio ganador y de alta calidad en el que puede confiar.";
    </script>
    {{-- End año de fundacion --}}
    <style>
        /* Estilo para reducir el espacio entre las columnas */
        .custom-col {
            margin-bottom: 1rem; /* Ajusta este valor según tus necesidades */
        }
        /* Estilo para las tarjetas personalizadas */
        .custom-card {
            background-color: black; /* Fondo negro */
            color: white; /* Texto blanco */
            border: 2px solid rgb(255, 115, 0); /* Borde naranja */
        }

        /* Estilo para centrar las tarjetas */
        .card {
            margin: auto; /* Centra horizontalmente las tarjetas */
        }
        /* Estilo para asegurar que los elementos internos no se junte al acercar la pantalla */
        .card-body {
            padding: 1rem;
        }
    </style>
</x-layouts.app>
