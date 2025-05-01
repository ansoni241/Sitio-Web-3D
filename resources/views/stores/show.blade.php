<x-layouts.app
    :title="$store->nombre"
    :meta-Description="$store->descripcion"
>
@vite(['resources/css/title.css'])
<style>
    .orange-bg {
    background-color: #ff4800!important;
    color: white;
    }
    .fondonaranja {
    background-color: #ff6600 !important;
    border: 2px solid white;
    color: white !important;
    }
    .fondonegro {
    background-color: #070707 !important;
    border: 2px solid white;
    color: white !important;
    }
    .fondotitulonegro {
    background-color: #070707 !important;
    border: 2px solid white;
    color: rgb(248, 6, 6) !important;
    }

</style>
{{-- <div">

    <a href="{{route('store')}}">Regresar</a>
</div> --}}
@vite(['resources/css/show.scss'])
<br>
<div class="container pb-5">
    <!-- Shop Detail Start -->
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div class="carousel-inner bg-light2 responsive-background" style="position: relative;">
                    @if ($store->model)
                        <div style="width: 100%; height: 450px; position: relative;">
                            <img
                                src="{{ asset('storage/product/' . $store->file) }}"
                                alt="Background Image"
                                style="width: 100%; height: 100%; object-fit: contain; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 0;"
                            >
                            <model-viewer
                                src="{{ asset('storage/models/' . $store->model) }}"
                                alt="Model Viewer example"
                                style="width: 100%; height: 100%; position: relative; z-index: 1;"
                                camera-controls
                                camera-orbit="65deg 55deg 7.5m"
                                auto-rotate
                            ></model-viewer>
                        </div>
                    @else
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/product/' . $store->file) }}" alt="Image">
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30 custom-bg">
                    <h3 class="bg-warning-transparent p-2 rounded text-danger">{{ $store->nombre }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-danger mr-2">
                            <small style="font-size: 20px;" class="fa fa-star text-danger mr-1"></small>
                            <small style="font-size: 20px;" class="fa fa-star text-danger mr-1"></small>
                            <small style="font-size: 20px;" class="fa fa-star text-danger mr-1"></small>
                            <small style="font-size: 20px;" class="fa fa-star text-danger mr-1"></small>
                            <small style="font-size: 20px;" class="fa fa-star text-danger mr-1"></small>
                        </div>
                        {{-- <small class="pt-1">(99 Reviews)</small> --}}
                    </div>
                    <h4 class="text-white">Descripción:</h4>
                    <p class="mb-4 text-white">{{ $store->descripcion }}</p>
                    <h4 class="text-white">Fisura:</h4>
                    <p class="mb-4 text-white">{{ $store->fisura }}</p>

                    <div class="mt-3 text-center">
                        <button type="button" class="btn btn-success px-3 addToCartBtn" data-product="{{ json_encode($store) }}">
                            <i class="fab fa-whatsapp mr-1"></i>
                            <span class="btn btn-success">Enviar Mensaje</span>
                        </button>
                    </div>
                    <br>
                    <div class="d-flex pt-2">
                        <strong class="text-white mr-2">Visitarnos:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="https://www.facebook.com/ladrillospatzi" target="_blank">
                                <i class="fab fa-facebook-f" style="color: #0852f4; font-size: 24px;"></i> <!-- Cambia el color a azul de Facebook -->
                            </a>
                            <a class="text-dark px-2" href="https://www.youtube.com/channel/UCVjTu7045Pd_glb81PPK5JQ" target="_blank">
                                <i class="fab fa-youtube" style="color: #fe0800; font-size: 24px;"></i> <!-- Cambia el color a rojo de YouTube -->
                            </a>
                            <a class="text-dark px-2" href="https://www.tiktok.com/@industrias_patzi?is_from_webapp=1&sender_device=pc" target="_blank">
                                <i class="fab fa-tiktok" style="color: #fefefe; font-size: 24px;"></i> <!-- Cambia el color a negro de TikTok -->
                            </a>
                            <a class="text-dark px-2" href="https://www.instagram.com/industriaspatzi" target="_blank">
                                <i class="fab fa-instagram" style="color: #f63374; font-size: 24px;"></i> <!-- Cambia el color a rosa de Instagram -->
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Shop Detail End -->
</div>
<div class="container">
    <h1 data-text="" style="text-align: center; font-size: 50px;">Ficha Técnica</h1>
</div>
<div class="container">
    {{-- FICHA PRODUCTO --}}
    <div class="card border-warning text-white bg-dark mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped text-left text-white border border-warning" style="background-color: black; color: white;">
                {{-- <table class="table table-dark"> --}}
                    <thead class="bg-light">
                        <tr>
                            <th  scope="col" colspan="5" class="text-center fondonaranja">PROPIEDADES FISICAS NB 1211001</th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="5" class="text-center fondonaranja">CARACTERISTICAS VISUALES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2" class="fondotitulonegro" style="vertical-align: middle; text-align: center;"><strong>FISURAS:</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="fondonegro">{{ $store->fisura }}</td>
                        </tr>
                        <tr>
                            <th scope="col" colspan="5" class="text-center fondonaranja">CARACTERISTICAS GEOMETRICAS</th>
                        </tr>
                        <tr>
                            <td class="fondonegro"></td>
                            <td class="text-center fondotitulonegro"><strong>NB 1211001</strong></td>
                            <td rowspan="2" class="fondotitulonegro" style="vertical-align: middle; text-align: center;"><strong>DIMENSIONES NOMINALES (cm)</strong></td>
                            <td colspan="2" class="text-center fondotitulonegro"><strong>RANGOS DE CONTROL ILP</strong></td>
                        </tr>
                        <tr>
                            <td class="text-center fondotitulonegro"><strong>DIMENSIONES:</strong></td>
                            <td class="text-center fondotitulonegro"><strong>TOLERANCIAS</strong></td>
                            <td class="text-center fondotitulonegro"><strong>MINIMO (cm)</strong></td>
                            <td class="text-center fondotitulonegro"><strong>MAXIMO (cm)</strong></td>
                        </tr>
                        <tr>
                            <td class="text-center fondotitulonegro"><strong>ALTO</strong></td>
                            <td class="text-center fondonegro">± {{ ($store->alto_tolerancia - floor($store->alto_tolerancia)) == 0 ? intval($store->alto_tolerancia) : $store->alto_tolerancia }}%</td>
                            <td class="text-center fondonegro">{{ $store->alto_dimensiones }}</td>
                            <td class="text-center fondonegro">{{ $store->alto_minimo }}</td>
                            <td class="text-center fondonegro">{{ $store->alto_maximo }}</td>
                        </tr>
                        <tr>
                            <td class="text-center fondotitulonegro"><strong>ANCHO</strong></td>
                            <td class="text-center fondonegro">± {{ ($store->ancho_tolerancia - floor($store->ancho_tolerancia)) == 0 ? intval($store->ancho_tolerancia) : $store->ancho_tolerancia }}%</td>

                            <td class="text-center fondonegro">{{ $store->ancho_dimensiones }}</td>
                            <td class="text-center fondonegro">{{ $store->ancho_minimo }}</td>
                            <td class="text-center fondonegro">{{ $store->ancho_maximo }}</td>
                        </tr>
                        <tr>
                            <td class="text-center fondotitulonegro"><strong>LARGO</strong></td>
                            <td class="text-center fondonegro">± {{ ($store->largo_tolerancia - floor($store->largo_tolerancia)) == 0 ? intval($store->largo_tolerancia) : $store->largo_tolerancia }}%</td>
                            <td class="text-center fondonegro">{{ $store->largo_dimensiones }}</td>
                            <td class="text-center fondonegro">{{ $store->largo_minimo }}</td>
                            <td class="text-center fondonegro">{{ $store->largo_maximo }}</td>
                        </tr>
                        <tr>
                            <th scope="col" colspan="5" class="text-center fondonaranja">CARACTERISTICAS PESO</th>
                        </tr>
                        <tr>
                            <td class="fondonegro"></td>
                            <td class="text-center fondotitulonegro"><strong>NORMA ILP</strong></td>
                            <td rowspan="2" class="fondotitulonegro" style="vertical-align: middle; text-align: center;"><strong>PESO NOMINAL (Kg)</strong></td>
                            <td colspan="2" class="text-center fondotitulonegro"><strong>RANGOS DE CONTROL ILP</strong></td>
                        </tr>
                        <tr>
                            <td class="text-center fondotitulonegro"><strong>PARAMETRO</strong></td>
                            <td class="text-center fondotitulonegro"><strong>TOLERANCIAS</strong></td>
                            <td class="text-center fondotitulonegro"><strong>MINIMO (Kg)</strong></td>
                            <td class="text-center fondotitulonegro"><strong>MAXIMO (Kg)</strong></td>
                        </tr>
                        <tr>
                            <td class="text-center fondotitulonegro"><strong>PESO:</strong></td>
                            <td class="text-center fondonegro">± {{ ($store->peso_tolerancia - floor($store->peso_tolerancia)) == 0 ? intval($store->peso_tolerancia) : $store->peso_tolerancia }}%</td>
                            <td class="text-center fondonegro">{{ $store->peso_dimensiones }}</td>
                            <td class="text-center fondonegro">{{ $store->peso_minimo }}</td>
                            <td class="text-center fondonegro">{{ $store->peso_maximo }}</td>
                        </tr>
                        <tr>
                            <th scope="col" colspan="5" class="text-center fondonaranja">CARACTERISTICAS FISICAS</th>
                        </tr>
                        <tr>
                            <td rowspan="2" class="fondotitulonegro" style="vertical-align: middle; text-align: center;"><strong>RESISTENCIA A LA COMPRESIÓN:</strong></td>
                            <td colspan="4" class="text-center fondotitulonegro"><strong>NB 1211001</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center fondonegro">≥ {{ $store->fisica_compresion }} (kg/cm<sup>2</sup>)</td>
                        </tr>
                        <tr>
                            <td  rowspan="2" class="fondotitulonegro" style="vertical-align: middle; text-align: center;"><strong>ABSORCIÓN DE AGUA:</strong></td>
                            <td colspan="2" class="text-center fondotitulonegro"><strong>% MINIMO</strong></td>
                            <td colspan="2" class="text-center fondotitulonegro"><strong>% MAXIMO</strong></td>
                        </tr>
                        <tr>
                            {{-- <td colspan="2" class="text-center fondonegro">{{ $store->fisica_minimo }}</td> --}}
                            <td colspan="2" class="text-center fondonegro">± {{ ($store->fisica_minimo - floor($store->fisica_minimo)) == 0 ? intval($store->fisica_minimo) : $store->fisica_minimo }}%</td>
                            {{-- <td colspan="2" class="text-center fondonegro">{{ $store->fisica_maximo }}</td> --}}
                            <td colspan="2" class="text-center fondonegro">± {{ ($store->fisica_maximo - floor($store->fisica_maximo)) == 0 ? intval($store->fisica_maximo) : $store->fisica_maximo }}%</td>
                        </tr>
                        <tr>
                            <th scope="col" colspan="5" class="text-center fondonaranja">RENDIMIENTO</th>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-center fondonegro">{{ $store->rendimiento }} unidades/m2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- END FICHA PRODUCTO --}}
</div>

<!-- Products Start -->
<div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3"><h1 style="text-align: center; font-size: 30px;">También Te Puede Gustar</h1></span>
    </h2>

    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel" id="related-carousel" data-autoplay="15000">
                @foreach ($allStores as $product)
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden" style="border: 2px solid rgb(255, 77, 0);">
                            {{-- <img class="img-fluid w-100" src="{{ asset('storage/product/' . $product->file) }}" alt=""> --}}
                            <a href="/store/{{ $product->id }}">
                                <img class="img-fluid w-100" src="{{ asset('storage/product/' . $product->file) }}" alt="">
                            </a>
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="/store/{{ $product->id }}"><i class="fa fa-shopping-cart" style="font-size: 45px;"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{ $product->nombre }}</a>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-danger mr-1"></small>
                                <small class="fa fa-star text-danger mr-1"></small>
                                <small class="fa fa-star text-danger mr-1"></small>
                                <small class="fa fa-star text-danger mr-1"></small>
                                <small class="fa fa-star text-danger mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Agrega más tarjetas aquí si es necesario -->
            </div>
        </div>
    </div>
</div>
<!-- Products End -->

@vite(['resources/js/show.js'])
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js">
</script>
<script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js">
</script>
<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var addToCartButtons = document.querySelectorAll('.addToCartBtn');

        addToCartButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var productData = JSON.parse(button.getAttribute('data-product'));
                var message = "Hola buenos días, quiero consultar el precio unitario de " + productData.nombre + " para la compra.";

                // Comprobar si el navegador admite la API de compartir de WhatsApp
                if (navigator.canShare && navigator.canShare({ title: 'Mensaje para WhatsApp', text: message })) {
                    navigator.share({
                        title: 'Mensaje para WhatsApp',
                        text: message
                    }).then(function () {
                        console.log('Mensaje compartido con éxito.');
                    }).catch(function (error) {
                        console.error('Error al compartir el mensaje:', error);
                    });
                } else {
                    // Si no es compatible, redirigir al enlace de WhatsApp
                    var whatsappURL = 'https://wa.me/59177533370?text=' + encodeURIComponent(message);
                    window.location.href = whatsappURL;
                }
            });
        });
    });
</script>

</x-layouts.app>
