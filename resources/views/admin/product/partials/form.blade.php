    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                {!! Form::label('nombre', 'Nombre:') !!}
                                {!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Ingrese el nombre del producto']) !!}
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                {!! Form::label('descuento', 'Descuento %:') !!}
                                {!! Form::text('descuento',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese el descuento']) !!}
                                @error('descuento')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                {!! Form::label('descripcion', 'Descripcion:') !!}
                                {!! Form::textarea('descripcion',null,['class' => 'form-control','placeholder'=>'Ingrese una descripción ','rows' => 2]) !!}
                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Características <small>Visuales</small></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('fisura', 'Fisuras:') !!}
                            {!! Form::textarea('fisura', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fisura','rows' => 2, 'maxlength' => 500]) !!}
                            @error('fisura')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Características <small>Geométricas</small></h3>
                    </div>
                    <div class="card-body">
                        <h2 style="text-align: center; margin-bottom: 20px; color: #e25b07;">Alto</h2>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('alto_tolerancia', 'Tolerancia:') !!}
                                    {!! Form::text('alto_tolerancia',null,['class' => 'form-control','placeholder'=>'Ingrese la tolerancia alto']) !!}
                                    @error('alto_tolerancia')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('alto_dimensiones', 'Dimenciones nominales (cm):') !!}
                                    {!! Form::text('alto_dimensiones',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese la dimencion nominal alto']) !!}
                                    @error('alto_dimensiones')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('alto_minimo', 'MINIMO (cm):') !!}
                                    {!! Form::text('alto_minimo',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese el minimo alto']) !!}
                                    @error('alto_minimo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('alto_maximo', 'MAXIMO (cm):') !!}
                                    {!! Form::text('alto_maximo',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese el maximo alto']) !!}
                                    @error('alto_maximo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h2 style="text-align: center; margin-bottom: 20px; color: #e25b07;">Ancho</h2>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('ancho_tolerancia', 'Tolerancia:') !!}
                                    {!! Form::text('ancho_tolerancia',null,['class' => 'form-control','placeholder'=>'Ingrese la tolerancia ancho']) !!}
                                    @error('ancho_tolerancia')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('ancho_dimensiones', 'Dimenciones nominales (cm):') !!}
                                    {!! Form::text('ancho_dimensiones',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese la dimencion nominal ancho']) !!}
                                    @error('ancho_dimensiones')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('ancho_minimo', 'MINIMO (cm):') !!}
                                    {!! Form::text('ancho_minimo',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese el minimo ancho']) !!}
                                    @error('ancho_minimo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('ancho_maximo', 'MAXIMO (cm):') !!}
                                    {!! Form::text('ancho_maximo',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese el maximo ancho']) !!}
                                    @error('ancho_maximo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h2 style="text-align: center; margin-bottom: 20px; color: #e25b07;">Largo</h2>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('largo_tolerancia', 'Tolerancia:') !!}
                                    {!! Form::text('largo_tolerancia',null,['class' => 'form-control','placeholder'=>'Ingrese la tolerancia largo']) !!}
                                    @error('largo_tolerancia')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('largo_dimensiones', 'Dimenciones nominales (cm):') !!}
                                    {!! Form::text('largo_dimensiones',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese la dimencion nominal largo']) !!}
                                    @error('largo_dimensiones')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('largo_minimo', 'MINIMO (cm):') !!}
                                    {!! Form::text('largo_minimo',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese el minimo largo']) !!}
                                    @error('largo_minimo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('largo_maximo', 'MAXIMO (cm):') !!}
                                    {!! Form::text('largo_maximo',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese el maximo largo']) !!}
                                    @error('largo_maximo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Características <small>Peso</small></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('peso_tolerancia', 'Tolerancia:') !!}
                                    {!! Form::text('peso_tolerancia',null,['class' => 'form-control','placeholder'=>'Ingrese la tolerancia peso']) !!}
                                    @error('peso_tolerancia')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('peso_dimensiones', 'PESO NOMINAL (Kg):') !!}
                                    {!! Form::text('peso_dimensiones',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese el peso nominal']) !!}
                                    @error('peso_dimensiones')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('peso_minimo', 'MINIMO (kg):') !!}
                                    {!! Form::text('peso_minimo',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese el minimo peso']) !!}
                                    @error('peso_minimo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('peso_maximo', 'MAXIMO (kg):') !!}
                                    {!! Form::text('peso_maximo',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese el maximo peso']) !!}
                                    @error('peso_maximo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Características <small>Físicas</small></h3>
                    </div>
                    <div class="card-body">
                        <h2 style="text-align: center; margin-bottom: 20px; color: #e25b07;">NB 1211001</h2>
                        <div class="form-group">
                            {!! Form::label('fisica_compresion', 'Resistencia a la  compresión:') !!}
                            {!! Form::text('fisica_compresion',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese la resistencia a la compresión']) !!}
                            @error('fisica_compresion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('fisica_minimo', '% MINIMO:') !!}
                                    {!! Form::text('fisica_minimo',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese la resustencia a la compresión']) !!}
                                    @error('fisica_minimo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    {!! Form::label('fisica_maximo', '% MAXIMO:') !!}
                                    {!! Form::text('fisica_maximo',null,['class' => 'form-control solo-numeros','placeholder'=>'Ingrese la resustencia a la compresión']) !!}
                                    @error('fisica_maximo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Rendimiento <small></small></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    {!! html_entity_decode(Form::label('rendimiento', 'Unidades/m<sup>2</sup>:')) !!}
                                    {!! Form::text('rendimiento',null,['class' => 'form-control solo-enteros','placeholder'=>'Ingrese las unidades']) !!}
                                    @error('rendimiento')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Imagen <small>Producto</small></h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="image-wrapper">
                                    @isset ($product->file)
                                        <img id="picture" src="{{ asset('storage/product/' . $product->file) }}" alt="">
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
                                <p>Por favor, selecciona una imagen con dimensiones específicas para garantizar una visualización óptima. La imagen debe tener un tamaño de 793 píxeles de ancho por 720 píxeles de alto. Si la imagen no cumple con estas dimensiones, es posible que no se muestre correctamente en la publicación.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Este script evita que se ingresen caracteres no numéricos en tiempo real y permite solo números enteros
        document.addEventListener("DOMContentLoaded", function() {
            var inputs = document.querySelectorAll('.solo-enteros');
            inputs.forEach(function(input) {
                input.addEventListener('input', function(e) {
                    // Removemos todos los caracteres no numéricos excepto los dígitos
                    this.value = this.value.replace(/\D/g, '');
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var inputs = document.querySelectorAll('.solo-numeros');
            inputs.forEach(function(input) {
                input.addEventListener('input', function(e) {
                    // Removemos todos los caracteres no numéricos excepto los dígitos y el punto decimal
                    this.value = this.value.replace(/[^\d.]/g, '');

                    // Si hay más de un punto decimal, eliminamos los extras
                    if ((this.value.match(/\./g) || []).length > 1) {
                        this.value = this.value.replace(/\.([^.]*)$/, '$1');
                    }
                });

                // Formatear el valor a 1 decimal cuando se cambia el foco
                input.addEventListener('blur', function(e) {
                    // Si el valor es un número entero, agregamos un decimal
                    if (/^\d+$/.test(this.value)) {
                        this.value = parseFloat(this.value).toFixed(1);
                    }
                });
            });
        });
    </script>
