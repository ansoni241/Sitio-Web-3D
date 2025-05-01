<!-- Footer Start -->
<div class="container-fluid footer-container">
    <div class="row content-row">
        <div class="col-lg-4 col-md-12 mb-5 contact-col">
            <h5 class="text-secondary text-uppercase mb-4">Ponerse En Contacto</h5>
            <p class="mb-4">Si tiene alguna pregunta, no dude en enviarnos un mensaje. Nos pondremos en contacto con usted lo antes posible.</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-danger mr-3"></i> EDIF. TITANIUM - PLANTA BAJA, C. 24, La Paz</p>
            <p class="mb-2"><i class="fa fa-envelope text-danger mr-3"></i> industriaspatzi@hotmail.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-danger mr-3"></i> +591 77533370 </p>
        </div>

        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">COMPRA RÁPIDA</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="{{ route('home') }}"><i class="fa fa-angle-right mr-2"></i>Inicio</a>
                        <a class="text-secondary mb-2" href="{{ route('store') }}"><i class="fa fa-angle-right mr-2"></i>Tienda</a>
                        <a class="text-secondary mb-2" href="{{ route('contact') }}"><i class="fa fa-angle-right mr-2"></i>Contacto</a>
                        <a class="text-secondary mb-2" href="{{ route('news') }}"><i class="fa fa-angle-right mr-2"></i>Noticias</a>
                        <a class="text-secondary mb-2" href="{{ route('about') }}"><i class="fa fa-angle-right mr-2"></i>Sobre Nosotros</a>
                        <a class="text-secondary" href="https://maps.app.goo.gl/PPKHUj6ixYmGuxAk9" target="_blank"><i class="fa fa-angle-right mr-2"></i>Ubicación</a>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">VISÍTENOS</h5>
                    <div class="d-flex flex-column justify-content-start embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15298.890713993922!2d-68.10281541284179!3d-16.54009239999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f2175d5f1acc9%3A0xbd2371547ec1e378!2sIndustrias%20en%20Ladrillos%20Patzi!5e0!3m2!1ses-419!2sus!4v1699195798727!5m2!1ses-419!2sus" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Información</h5>
                    <p>Para consultas, escríbenos a nuestras redes sociales. Estamos aquí para ayudarte.</p>
                    {{-- <form action="{{ route('contact') }}" id="primerFormulario">
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" placeholder="Correo electrónico">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Mensaje</button>
                            </div>
                        </div>
                    </form> --}}
                    <h6 class="text-secondary text-uppercase mt-4 mb-3">Siga Con Nosotros</h6>
                    {{-- <div class="d-flex social-icons">
                        <a class="btn btn-primary btn-dark" href="https://www.tiktok.com/@industrias_patzi?is_from_webapp=1&sender_device=pc" target="_blank"><i class="fab fa-tiktok"></i></a>
                        <a class="btn btn-primary btn-square" href="https://www.facebook.com/ladrillospatzi" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-danger" href="https://www.youtube.com/channel/UCVjTu7045Pd_glb81PPK5JQ" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-primary btn-square" href="https://www.instagram.com/industriaspatzi" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div> --}}
                    <div class="d-flex social-icons">
                        @redsocial
                            @if($redsocial->redsocial === 'tiktok')
                                <a class="btn btn-primary btn-dark" href="{{ $redsocial->url }}" target="_blank">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            @elseif($redsocial->redsocial === 'facebook')
                                <a class="btn btn-primary btn-square" href="{{ $redsocial->url }}" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @elseif($redsocial->redsocial === 'youtube')
                                <a class="btn btn-primary btn-danger" href="{{ $redsocial->url }}" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @elseif($redsocial->redsocial === 'instagram')
                                <a class="btn btn-outline-danger btn-square" href="{{ $redsocial->url }}" target="_blank">
                                    <i class="fab fa-instagram fa-1x" style="color: #f7f7f7;"></i>
                                </a>
                            @endif
                        @endredsocial
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row footer-bottom-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner text-center">
                        <p>&copy; {{ date("Y") }}<a href="{{ route('home')}}" class="footer-link"> Industrias en Ladrillo Patzi</a> Designed By <a href="https://www.facebook.com/anthony.g.9085?mibextid=ZbWKwL" target="_blank" class="footer-link">MAGG</a>. All rights reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('pedido') && session('pedido') == 'success')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton:false,
                timer: 2000,
                timerProgessBar:true,
            })

            Toast.fire({
                icon:'success',
                title:'Pedido realizado correctamente!',
            })
        </script>
    @endif
    <?php session()->forget('pedido'); ?>
</div>
<!-- Footer End -->

