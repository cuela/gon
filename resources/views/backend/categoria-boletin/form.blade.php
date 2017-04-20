<div class="box-body">
    <div class="form-group">
        {{ Form::label('padre_id', 'Nodo Padre', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            <select type="text" id="padre_id" class="form-control" name="padre_id">
                {!!$listaPadre!!}
            </select>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el descripcion']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('orden', 'Orden', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('orden', $maximo, ['class' => 'form-control', 'placeholder' => 'Introduzca el orden']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('estado', 'Estado', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('estado', '1', true) }} Habilitado
            {{ Form::radio('estado', '0') }} Deshabilitado

        </div><!--col-lg-10-->
    </div><!--form control-->
    
    
</div>