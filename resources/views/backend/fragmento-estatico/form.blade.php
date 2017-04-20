<div class="box-body">

    <div class="form-group">
        {{ Form::label('titulo', 'Título', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el titulo']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('subtitulo', 'Sub Título', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('subtitulo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el subtitulo']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('url', 'Enlace (url)', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el url']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('imagen', 'Imágen', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::file('imagen') }}
            @if(isset($fragmentoEstatico))
                @if($fragmentoEstatico->imagen)
                    <img src="{{asset($fragmentoEstatico->imagen)}}" width="300px">
                @endif
            @endif
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('resumen', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('resumen', null, ['class' => 'form-control', 'placeholder' => ' Introduzca Descripción']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('destacado', 'Destacado', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('destacado', '1') }} Si
            {{ Form::radio('destacado', '0', true) }} No

        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('orden', 'orden', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('orden', $maximo, ['class' => 'form-control', 'placeholder' => 'Introduzca el orden']) }}
        </div>
    </div>
    
    <div class="form-group">
        {{ Form::label('estado', 'Estado', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('estado', '1', true) }} Habilitado
            {{ Form::radio('estado', '0') }}
            Deshabilitado

        </div><!--col-lg-10-->
    </div><!--form control-->
    
</div>