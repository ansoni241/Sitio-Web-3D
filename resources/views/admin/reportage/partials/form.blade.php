<div class="form-group">
    {!! Form::label('fecha', 'fecha') !!}
    {!! Form::input('date','fecha',null,['class' => 'form-control','placeholder'=>'Seleccione una fecha']) !!}
    @error('fecha')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion') !!}
    {!! Form::text('descripcion',null,['class' => 'form-control','placeholder'=>'Ingrese una descripción ']) !!}
    @error('descripcion')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($reportage->file)
                <img id="picture" src="{{ asset('storage/news/' . $reportage->file) }}" alt="">
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
        <p>Por favor, selecciona una imagen con dimensiones específicas para garantizar una visualización óptima. La imagen debe tener un tamaño de 1280 píxeles de ancho por 1280 píxeles de alto. Si la imagen no cumple con estas dimensiones, es posible que no se muestre correctamente en la publicación.</p>
    </div>
</div>
