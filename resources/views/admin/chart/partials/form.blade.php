<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Ingre el nombre de la imagen']) !!}
    @error('fecha')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($chart->file)
                <img id="picture" src="{{ asset('storage/chart/' . $chart->file) }}" alt="">
            @else
                <img id="picture" src="{{ asset('images/imagenSubida.png') }}" alt="">
            @endisset

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
            {!! Form::file('file', ['class' => 'form-control-file','accept'=>'image/*']) !!}
            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <p>Por favor, selecciona una imagen con dimensiones específicas para garantizar una visualización óptima. La imagen debe tener un tamaño de 150 píxeles de ancho por 150 píxeles de alto. Si la imagen no cumple con estas dimensiones, es posible que no se muestre correctamente en la publicación.</p>
    </div>
</div>
