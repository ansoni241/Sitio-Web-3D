<x-layouts.app
    title="Sobre Nosotros"
    meta-Description="About meta descripcion"
>
    @vite(['resources/css/title.css'])
    <dir class="container">
        <h1 style="text-align: center; font-size: 50px;">Sobre Nosotros</h1>
    </dir>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-5 col-xs-12 col-sm-12">
                <div class="mod-img">
                    <a href="{{ asset('images/mision.webp') }}" data-fancybox="images">
                        <img class="img-fluid" loading="lazy" src="{{ asset('images/mision.webp') }}" alt="Image" style="max-width: 100%; height: auto;">
                    </a>
                </div>
            </div>
            <div class="col-md-7 col-xs-12 col-sm-12 d-flex align-items-center justify-content-center text-white" style="background-color: rgba(0, 0, 0, 0.981);">
                <div class="text-center">
                    <h4 class="text-lg">MISIÓN</h4>
                    <hr class="white-linea">
                    <p class="text-lg">Contribuimos a la industria de la construcción a través de la fabricación y comercialización de productos de arcilla de calidad superior, satisfaciendo las expectativas de nuestros clientes, coadyuvando a la mejora del sector y respetando la seguridad y el medio ambiente.</p>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-7 col-xs-12 col-sm-12 d-flex align-items-center justify-content-center text-white" style="background-color: rgba(0, 0, 0, 0.981);">
                <div data-aos="flip-right" class="text-center">
                    <h4 class="text-lg">VISIÓN</h4>
                    <hr class="white-linea">
                    <p class="text-lg">Ser la empresa ladrillera líder a nivel nacional, basada en la excelencia, innovación y desarrollo tecnológico, garantizando la calidad y variedad de productos de arcilla a precios competitivos.</p>
                </div>
            </div>
            <div class="col-md-5 col-xs-12 col-sm-12">
                <div data-aos="flip-right" class="mod-img">
                    <a href="{{ asset('images/vision.webp') }}" data-fancybox="images">
                        <img class="img-fluid" loading="lazy" src="{{ asset('images/vision.webp') }}" alt="Image" style="max-width: 100%; height: auto;">
                    </a>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-5 col-xs-12 col-sm-12">
                <div data-aos="flip-right" class="mod-img">
                    <a href="{{ asset('images/politica.webp') }}" data-fancybox="images">
                        <img class="img-fluid" loading="lazy" src="{{ asset('images/politica.webp') }}" alt="Image" style="max-width: 100%; height: auto;">
                    </a>
                </div>
            </div>
            <div class="col-md-7 col-xs-12 col-sm-12 d-flex align-items-center justify-content-center text-white" style="background-color: rgba(0, 0, 0, 0.981);">
                <div data-aos="flip-right" class="text-center">
                    <h4 class="text-lg">POLÍTICA DE CALIDAD</h4>
                    <hr class="white-linea">
                    <p class="text-lg">Somos una empresa dedicada a la producción y comercialización de productos cerámicos de alta calidad para clientes que necesitan soluciones prácticas en materiales de construcción, excediendo sus requerimientos, superando sus expectativas y cumpliendo la normativa vigente.</p>
                    <p class="text-lg">Ofrecemos productos con prontitud, puntualidad, dedicación según las necesidades de nuestros clientes; es por ello que la alta Dirección ha decidido implantar, respaldar y mantener un sistema de gestión de la calidad basado en la norma ISO 9001:2015, promoviendo la mejora continua de los procesos que impactan a nuestros clientes y partes interesadas</p>
                </div>
            </div>
        </div>
            @vite(['resources/css/title.css'])
            <h1 style="text-align: center; font-size: 50px;">HISTORIA</h1>
        <div class="container-fluid" style="background-color: rgba(255, 102, 0, 0.779); padding: 20px; margin-top: 20px;">

            {{-- CUADRO 2 --}}
            <div class="container-fluid" style="background-color: rgb(0, 0, 0, 0.981);">
                <div class="row align-items-center">
                    <!-- Contenido a la izquierda -->
                    <div class="col-md-6">
                        <div data-aos="flip-left" class="text-center text-white">
                            <p class="text-lg">El Grupo Industrial Patzi es un conglomerado de tres empresas dedicadas a la producción y comercialización de productos dedicados al rubro de la construcción en base a materiales cerámicos.
                                Fue fundado por los señores Federico Patzi Suxo y Carlos Patzi Suxo en el año 1987 con el nombre de Industrias Cerámica Patzi, en la ciudad de Viacha.</p>
                            <p class="text-lg">La alta demanda permitió que en el año 1996 de una producción rustica que alcanzaba una producción de 7.000 unidades por día se pueda cuadriplicar llegando a realizar hasta 35.000 unidades de ladrillos por día con la adquisición de nuevos equipos de la línea Bonfati.
                                A partir del año 2000 las inversiones son divididas convirtiéndose en una empresa Unipersonal quedando a la cabeza el Sr. Federico Patzi Suxo.</p>
                        </div>
                    </div>
                    <!-- Cuadro de presentación de imágenes -->
                    <div class="col-md-6">
                        <div data-aos="flip-right" class="mod-img">
                            <a href="{{ asset('images/historia1.webp') }}" data-fancybox="images">
                                <img class="img-fluid" loading="lazy" src="{{ asset('images/historia1.webp') }}" alt="Image" style="max-width: 100%; height: auto;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END CUADRO 2 --}}
            {{-- CUADRO 3 --}}
            <div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.981);">
                <div class="row align-items-center">
                    <!-- Cuadro de presentación de imágenes -->
                    <div class="col-md-6">
                        <div data-aos="flip-left" class="mod-img">
                            <a href="{{ asset('images/historia5.webp') }}" data-fancybox="images">
                                <img class="img-fluid" loading="lazy" src="{{ asset('images/historia5.webp') }}" alt="Image">
                            </a>
                        </div>
                    </div>
                    <!-- Contenido a la derecha -->
                    <div class="col-md-6">
                        <div data-aos="flip-right" class="text-center text-white">
                            <p class="text-lg">En 2017, Industrias en Ladrillos Patzi experimentó un nuevo impulso gracias a importantes inversiones que ampliaron nuestras instalaciones y diversificaron nuestra oferta de productos. Esta estrategia nos permitió expandir nuestro mercado y llegar a nuevos clientes. En enero de 2018, la empresa reabrió sus puertas bajo el mismo nombre, pero con una imagen renovada que reflejaba nuestro compromiso con la calidad y la innovación. Nuestra nueva ubicación en Viacha, calle Alcoreza 2000, Zona Humachua, nos brindó una posición estratégica para acceder a un mercado más amplio. La planta ampliada y modernizada, junto con la diversificación de productos, nos ha permitido consolidarnos como un referente en la industria de la construcción en Bolivia</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END CUADRO 3 --}}
            {{-- CUADRO 4 --}}
            <div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.981);">
                <div class="row align-items-center">
                    <!-- Contenido a la izquierda -->
                    <div class="col-md-6">
                        <div data-aos="flip-left" class="text-center text-white">
                            <p class="text-lg">En 2019, Industrias en Ladrillos Patzi marcó un hito al obtener la certificación ISO 9001:2015, un aval internacional a su sistema de gestión de calidad que garantiza la excelencia en sus procesos. Este logro, fruto del esfuerzo y dedicación del equipo, consolida su compromiso con la mejora continua, la satisfacción del cliente y la eficiencia en la gestión de recursos. La calidad, presente en cada paso, permite a la empresa ofrecer productos confiables, seguros y que satisfacen plenamente las necesidades de los clientes. Con la mirada puesta en el futuro, Industrias en Ladrillos Patzi reitera su compromiso con la calidad, trabajando incansablemente para mantener y mejorar su sistema de gestión, consolidándose como una empresa líder en el mercado nacional e internacional.</p>
                        </div>
                    </div>
                    <!-- Cuadro de presentación de imágenes -->
                    <div class="col-md-6">
                        <div data-aos="flip-right" class="mod-img">
                            <a href="{{ asset('images/historia2.webp') }}" data-fancybox="images">
                                <img class="img-fluid" loading="lazy" src="{{ asset('images/historia2.webp') }}" alt="Image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END CUADRO 4 --}}
            {{-- CUADRO 5 --}}
            <div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.981);">
                <div class="row align-items-center">
                    <!-- Cuadro de presentación de imágenes -->
                    <div class="col-md-6">
                        <div data-aos="flip-left" class="mod-img">
                            <a href="{{ asset('images/historia4.webp') }}" data-fancybox="images">
                                <img class="img-fluid" loading="lazy" src="{{ asset('images/historia4.webp') }}" alt="Image">
                            </a>
                        </div>
                    </div>
                    <!-- Contenido a la derecha -->
                    <div class="col-md-6">
                        <div data-aos="flip-right" class="text-center text-white">
                            <p class="text-lg">En el año 2020, Industrias en Ladrillos Patzi recibió el "Premio Maya 2020 Forjadores", un galardón que consolida su trayectoria como empresa familiar ejemplar, fundada por Federico Patzi y Clotilde Fernández de Patzi, quienes con esfuerzo y visión convirtieron sus sueños en un proyecto exitoso. Este reconocimiento no solo celebra su inspiradora historia, sino también el impacto socioeconómico positivo que han generado en Bolivia.</p>
                            <p class="text-lg">Industrias en Ladrillos Patzi no solo se destaca por su excelencia empresarial, sino también por su compromiso con la responsabilidad social y el cuidado del medio ambiente, posicionándose como un referente en la industria. Este reconocimiento impulsa a la empresa a continuar su camino de crecimiento y desarrollo, dejando una huella imborrable en el tejido socioeconómico de Bolivia.</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END CUADRO 5 --}}
        </div>
    </div>

</x-layouts.app>
