<x-layouts.app
    title="Entrevistas"
    meta-Description="Entrevistas meta descripcion"
>
    @vite(['resources/css/title.css'])
    <br>
    <div class="container">
        <h1 data-text="" style="text-align: center; font-size: 50px;">Entrevistas</h1>
    </div>
    <div class="container">
        <div class="row" id="videoGrid">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <button class="btn btn-light"><i class="fas fa-book"></i></button>
                        <button class="btn btn-light ml-2"><i class="fas fa-handshake"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Paginacion --}}
    <div class="container mt-4">
        <ul class="pagination justify-content-center" id="pagination"></ul>
    </div>
    {{-- End Paginacion --}}
<style>
    .video-title {
        color: red; /* Cambia el color del título a rojo */
        font-weight: bold; /* Añade negritas al título */
        margin-bottom: 20px; /* Agrega un margen inferior para separar el título del video */
    }
    .video-layer {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
    }

    .video-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        max-width: 800px;
        padding: 20px;
        text-align: center;
    }

    .btn-close {
        position: absolute;
        top: 10px;
        right: 10px;
        margin-right: -40px;
        width: 30px;
        height: 30px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 18px;
        line-height: 1.6;
        text-align: center;
    }
    .product-item .text-center {
        background-color: black; /* Cambia el color de fondo a negro */
        color: white; /* Cambia el color del texto a blanco */
        padding: 10px; /* Ajusta el relleno según sea necesario */
        border-top: 1px solid white; /* Opcional: añade un borde superior blanco */
    }
    .product-img img {
        height: 200px; /* Ajusta esta altura según tu preferencia */
    }
</style>
<script>

    // Convertir la colección de videos a un array de objetos JavaScript
    const entrevistaData = {!! $entrevistas->map(function ($entrevista) {
        return [
            'thumbnail' => asset('storage/entrevista/' . $entrevista->fondo),
            'Url' => $entrevista->url,
            'title' => $entrevista->title,
            'uploadDate' => 'Subida: ' . $entrevista->created_at->format('d \d\e F \d\e Y'),
        ];
    })->toJson() !!};
    // Convertir el objeto JavaScript en un array
    const videos = Object.values(entrevistaData);
    // Invertir el orden de los videos
    videos.reverse();
    function displayVideos(page) {
        const videosPerPage = 12;
        const startIndex = (page - 1) * videosPerPage;
        const endIndex = startIndex + videosPerPage;
        const paginatedVideos = videos.slice(startIndex, endIndex);

        const videoGrid = document.getElementById('videoGrid');
        videoGrid.innerHTML = '';

        paginatedVideos.forEach((video, index) => {
            const col = document.createElement('div');
            col.className = 'col-lg-3 col-md-4 col-sm-6';
            col.innerHTML = `
                <div class="product-item bg-light mb-4" style="border: 2px solid rgb(255, 111, 0);">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="${video.thumbnail}" alt="Vista previa del video" onclick="window.open('${video.Url}', '_blank');">
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" style="display: block; max-height: 2.4em; overflow: hidden; text-overflow: ellipsis;">${video.title}</a>
                        <div class="mb-1">${video.uploadDate}</div>
                    </div>
                </div>
            `;
            videoGrid.appendChild(col);
        });
    }

    function renderPagination() {
        const videosPerPage = 12;
        const totalPages = Math.ceil(videos.length / videosPerPage);
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.className = 'page-item';
            const a = document.createElement('a');
            a.className = 'page-link';
            a.href = '#';
            a.textContent = i;
            a.addEventListener('click', function() {
                displayVideos(i);
            });
            li.appendChild(a);
            pagination.appendChild(li);
        }
    }

    displayVideos(1);
    renderPagination();
</script>

</x-layouts.app>
