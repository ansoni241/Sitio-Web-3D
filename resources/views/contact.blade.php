<x-layouts.app
    title="Contacto"
    meta-Description="Contact meta descripcion"
>
    @vite(['resources/css/title.css'])
    <style>
        .fondonegro {
        background-color: #070707e4 !important;
        border: 2px solid rgb(255, 0, 0);
        color: white !important;
        box-shadow: 0 0 5px 8px rgba(228, 71, 14, 0.7)!important;
        }
        #segundoFormulario .form-control:focus {
            /* border-color: red; */
            border: 4px solid rgb(228, 71, 14);
            box-shadow: 0 0 20px red;
            outline: none;
        }
    </style>
    <!-- Contact Start -->
    <br>
    <div class="container-fluid">
        <div class="container">
            <h1 style="text-align: center; font-size: 35px;">Póngase En Contacto Con Nosotros</h1>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-4 fondonegro">
                    <div id="success"></div>
                    <form action="{{ route('contact') }}" method="POST" id="segundoFormulario">
                        @csrf
                        <div class="form-group mb-3">
                            <input
                                autofocus="autofocus"
                                type="text" class="form-control"
                                name="name" id="name"
                                placeholder="Nombres"
                                required="required"
                                value="{{ old('name') }}" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                name="lastname"
                                id="lastname"
                                placeholder="Apellidos"
                                required="required"
                                value="{{ old('lastname') }}" />
                            @error('lastname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input
                                type="email" class="form-control"
                                name="email"
                                id="email"
                                placeholder="Correo Electronico"
                                required="required"
                                value="{{ old('email') }}" />
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                name="affair"
                                id="affair"
                                placeholder="Asunto"
                                required="required"
                                value="{{ old('affair') }}" />
                            @error('affair')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <textarea
                                class="form-control"
                                rows="6"
                                name="message"
                                id="message"
                                placeholder="Mensaje"
                                required="required">{{ old('message') }}</textarea>
                            @error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            {!! NoCaptcha::renderJs('es', false, 'onloadCallback') !!}
                            {!! NoCaptcha::display() !!}
                            <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-success py-2 px-4" type="submit" id="sendMessageButton">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-4 mb-4 fondonegro">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15298.89071399392!2d-68.1028154!3d-16.5400924!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f2175d5f1acc9%3A0xbd2371547ec1e378!2sIndustrias%20en%20Ladrillos%20Patzi!5e0!3m2!1ses-419!2sbo!4v1699198251862!5m2!1ses-419!2sbo"
                        frameborder="0" style="border:0; width: 100%; height: 250px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="bg-light p-4 fondonegro">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-danger mr-3"></i> EDIF. TITANIUM - PLANTA BAJA, C. 24, La Paz</p>
                    <p class="mb-2" id="ventas-email-link">
                        <i class="fa fa-envelope text-danger mr-3"></i>
                        <span><a href="#" onclick="sendVentasEmail()">ventas@industriaspatzi.com</a></span>
                    </p>
                    <p class="mb-2" id="email-link">
                        <i class="fa fa-envelope text-danger mr-3"></i>
                        <span><a href="#" onclick="sendEmail()">industriaspatzi@hotmail.com</a></span>
                    </p>
                    <p class="mb-2" id="whatsapp-link">
                        <i class="fa fa-phone-alt text-danger mr-3"></i>
                        <a href="#" onclick="openWhatsApp()">+591 77533370</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
{{-- @vite(['resources/js/contactvalidate.js']) --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<script>
    function openWhatsApp() {
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

        var message = encodeURIComponent("Hola buenos días, quiero más información sobre los productos y sus precios.");

        if (isMobile) {
            window.location.href = 'whatsapp://send?phone=+59177533370&text=' + message;
        } else {
            window.open('https://web.whatsapp.com/send?phone=+59177533370&text=' + message, '_blank');
        }
    }
    function sendEmail() {
        var subject = encodeURIComponent("Consulta sobre productos");
        var body = encodeURIComponent("Hola buenos días, estoy interesado(a) en obtener más información sobre sus productos y servicios.");

        window.location.href = 'mailto:industriaspatzi@hotmail.com?subject=' + subject + '&body=' + body;
    }
    function sendVentasEmail() {
        var subject = encodeURIComponent("Consulta sobre productos");
        var body = encodeURIComponent("Hola buenos días, estoy interesado(a) en obtener más información sobre los productos y servicios de ventas.");

        window.location.href = 'mailto:ventas@industriaspatzi.com?subject=' + subject + '&body=' + body;
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN97r5JTfGs17OtARsyIWfLyKep-tie8Q&callback=initMap" async defer></script>
</x-layouts.app>
<script>
    var onloadCallback = function(){
        alert("grecaptcha is ready")
    }
    function checkRecaptcha() {
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
            alert("Por favor, completa el reCAPTCHA.");
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>
