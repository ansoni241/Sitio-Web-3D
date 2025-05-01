<x-layouts.app
    title="Noticias"
    meta-Description="News meta descripcion"
>
    @vite(['resources/css/title.css'])
    <br>
    <div class="container">
        <h1 style="text-align: center; font-size: 50px;">Noticias</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center my-50">
            <div class="col-md-12 col-sm-12 col-xs-12 my-50">
                @foreach (array_reverse($news->toArray()) as $publicacion)
                    <div class="facebook-post my-5">
                        <div class="post-header">
                            <img src="{{ asset('images/perfil.png') }}" alt="Foto de perfil">
                            <div class="post-info">
                                <p class="user-name"><b>Industrias en Ladrillo Patzi</b></p>
                                <p class="post-time"><b>{{ $publicacion->fecha }}</b></p>
                            </div>
                        </div>
                        <div class="post-content">
                            <a href="#" class="openImagePopup" data-image="{{ asset('storage/news/' . $publicacion->file) }}">
                                <img src="{{ asset('storage/news/' . $publicacion->file) }}" alt="Imagen de la publicación">
                            </a>
                            <p class="post-description">{{ $publicacion->descripcion }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

<!-- Ventana emergente para la imagen ampliada -->
<div id="imagePopup" class="popup">
    <span id="closePopup" class="close-popup" title="Cerrar">&times;</span>
    <img id="popupImage" class="popup-content">
</div>
<script>
    const openImagePopups = document.querySelectorAll('.openImagePopup');

    openImagePopups.forEach(openImagePopup => {
        openImagePopup.addEventListener('click', function (event) {
            event.preventDefault();
            const imageSrc = this.getAttribute('data-image');
            document.getElementById('popupImage').src = imageSrc;
            document.getElementById('imagePopup').style.display = 'block';
        });
    });

    document.getElementById('closePopup').addEventListener('click', function () {
        document.getElementById('imagePopup').style.display = 'none';
    });
</script>

</x-layouts.app>
