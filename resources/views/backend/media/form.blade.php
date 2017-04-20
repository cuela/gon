<div class="box-body">

    <div class="form-group">
        {{ Form::label('nombre_archivo', 'Nombre', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('nombre_archivo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre_archivo']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('ruta', 'Ruta', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('ruta', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el ruta']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('tipo', 'tipo', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('tipo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el tipo']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('tamanio', 'tamanio', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('tamanio', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el tamanio']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('orden', 'orden', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('orden', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el orden']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('estado', 'estado', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el estado']) }}
        </div>
    </div>
    
</div>