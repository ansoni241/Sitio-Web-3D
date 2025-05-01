<x-layouts.app
    title="Tienda"
    meta-Description="Store meta descripcion"
>
    @vite(['resources/css/title.css'])
    <br>
    <div class="container">
        <h1 data-text="" style="text-align: center; font-size: 50px;">Tienda</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <button class="btn btn-light"><i class="fas fa-book"></i></button>
                        <button class="btn btn-light ml-2"><i class="fas fa-handshake"></i></button>
                    </div>
                </div>
            </div>
            <!-- Productos -->
            @foreach ($stores as $store)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-item bg-black text-white mb-4" style="border: 2px solid rgb(255, 111, 0);">
                        <div class="product-img position-relative overflow-hidden">
                            <a href="/store/{{ $store->id }}">
                                <img class="img-fluid w-100" src="{{ asset('storage/product/' . $store->file) }}" alt="">
                            </a>
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="/store/{{ $store->id }}"><i class="fas fa-eye fa-fw" style="font-size: 45px;"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="/store/{{ $store->id }}">{{ $store->nombre }}</a>
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
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
