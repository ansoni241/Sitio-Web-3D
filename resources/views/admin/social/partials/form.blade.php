<div class="form-group">
    {!! Form::label('url', 'URL') !!}
    {!! Form::text('url',null,['class' => 'form-control','placeholder'=>'Ingrese una URL ']) !!}
    @error('url')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('pdf', 'Ingrese el Documento') !!}
    {!! Form::file('pdf', ['class' => 'form-control-file','accept'=>'.pdf']) !!}
    @error('pdf')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    <br>
    <p>Por favor, selecciona un Documento con extención .pdf</p>
</div>
