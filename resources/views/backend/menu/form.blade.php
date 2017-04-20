<div class="box-body">
    <div class="form-group">
    
        {{ Form::label('padre_id', 'Nodo Padre', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <select type="text" id="padre_id" class="form-control" name="padre_id">
                {!!$padreMenu!!}
            </select>
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('url', 'Enlace', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => ' Introduzca Enlace']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('destino', 'Destino', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('destino', '_self', true) }} Ventana Actual
            {{ Form::radio('destino', '_blank') }}
            Nueva Ventana
        </div><!--col-lg-10-->
    </div><!--form control-->
<!--
    <div class="form-group">
        {{ Form::label('imagen', 'Imagen Miniatura', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::file('imagen') }}
        </div>
    </div>
    -->

    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => ' Introduzca Descripción']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('orden', 'Orden', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('orden', $maximo, ['class' => 'form-control', 'placeholder' => ' Introduzca Orden']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('estado', 'Estado', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('estado', '1', true) }} Habilitado
            {{ Form::radio('estado', '0') }}
            Deshabilitado

        </div><!--col-lg-10-->
    </div><!--form control-->
    
</div><!-- /.box-body -->