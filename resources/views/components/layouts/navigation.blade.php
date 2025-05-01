<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        {{-- <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-75 custom-nav-btn" data-bs-toggle="collapse" href="#navbar-vertical">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categorias</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light custom-nav-vertical" id="navbar-vertical">
                <div class="navbar-nav w-100">
                    <a href="shopID.php?id_categorias=1" class="nav-item nav-link">Abarrotes</a>
                </div>
            </nav>
        </div> --}}
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none custom-navbar-brand">
                    <div class="col-lg-4">
                        <a href="/" class="text-decoration-none d-flex align-items-center">
                            {{-- <video width="77" autoplay loop muted class="logodos-video">
                                <source src="{{ asset('videos/Logo1.webm') }}" type="video/webm">
                                Tu navegador no soporta el elemento video.
                            </video> --}}
                            <img src="{{ asset('videos/Logo1.gif') }}" alt="Logo" width="77" class="logodos-video">
                            <span class="h1 text-uppercase text-dark bg-dark px-2 ml-n1 logo-with-image" style="background-image: url('{{ asset('images/banner.webp') }}'); background-size: contain; background-repeat: no-repeat; background-position: center;"></span>
                        </a>
                    </div>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('home') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">Inicio</a>
                        <a href="{{ route('store') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'store' ? 'active' : '' }}">Tienda</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">Contactanos</a>
                        <div class="nav-item dropdown custom-dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Información</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('about') }}" class="dropdown-item {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">Sobre Nosotros</a>
                                <a href="{{ route('video') }}" class="dropdown-item {{ Route::currentRouteName() == 'video' ? 'active' : '' }}">Videos</a>
                                <!-- Puedes agregar más opciones si lo necesitas -->
                            </div>
                        </div>
                        <div class="nav-item dropdown custom-dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Novedades</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('interviews') }}" class="dropdown-item {{ Route::currentRouteName() == 'interviews' ? 'active' : '' }}">Entrevistas</a>
                                <a href="{{ route('news') }}" class="dropdown-item {{ Route::currentRouteName() == 'news' ? 'active' : '' }}">Noticias</a>
                                <!-- Puedes agregar más opciones si lo necesitas -->
                            </div>
                        </div>
                        <div class="nav-item dropdown custom-dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Acceder</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('login') }}" class="dropdown-item {{ Route::currentRouteName() == 'login' ? 'active' : '' }}">Login</a>
                                {{-- <a href="{{ route('register') }}" class="dropdown-item {{ Route::currentRouteName() == 'register' ? 'active' : '' }}">Registrarse</a> --}}
                                <!-- Puedes agregar más opciones si lo necesitas -->
                            </div>
                        </div>
                        {{-- <div class="nav-item dropdown custom-dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Administración</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('login') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'login' ? 'active' : '' }}">Login</a>
                                <a href="{{ route('register') }}" class="nav-item nav-link {{ Route::currentRouteName() == 'register' ? 'active' : '' }}">Registrarse</a>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="video-logo-container">
                        <a href="/">
                            <video width="88" autoplay loop muted>
                                <source src="{{ asset('videos/Logo1.webm') }}" type="video/webm">
                                Tu navegador no soporta el elemento video.
                            </video>
                        </a>
                    </div> --}}
                    <div class="video-logo-container">
                        <a href="/">
                            <img src="{{ asset('videos/Logo1.gif') }}" alt="Logo" width="88">
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Asegúrate de incluir jQuery antes de este código -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Agrega un evento al elemento principal del menú desplegable
        $('.custom-dropdown').hover(function() {
            // Muestra el menú desplegable automáticamente al pasar el mouse
            $(this).find('.dropdown-menu').stop(true, true).fadeIn();
        }, function() {
            // Oculta el menú desplegable cuando se retira el mouse
            $(this).find('.dropdown-menu').stop(true, true).fadeOut();
        });

        // Añade y quita la clase "active" al hacer clic en un elemento del menú
        $('.navbar-nav .nav-item .nav-link').on('click', function() {
            $('.navbar-nav .nav-item .nav-link').removeClass('active');
            $(this).addClass('active');
            $(this).parent().addClass('active'); // Agrega la clase active al <li> también
        });

        // Maneja el color al hacer hover en las opciones del menú desplegable
        $('.custom-dropdown .dropdown-menu .nav-item.nav-link').hover(function() {
            $(this).css('background-color', 'tu-color-de-fondo');
            $(this).css('color', 'tu-color-de-texto');
        }, function() {
            $(this).css('background-color', ''); // Restaura el color original al salir del hover
            $(this).css('color', ''); // Restaura el color original al salir del hover
        });
    });

    $('.navbar-nav .nav-item .nav-link').on('click', function() {
    $('.navbar-nav .nav-item .nav-link').removeClass('active');
    $(this).addClass('active');
    $(this).parent().addClass('active'); // Agrega la clase active al <li> también
});

</script>

<!-- Navbar End -->
