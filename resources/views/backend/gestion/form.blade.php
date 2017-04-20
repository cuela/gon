<div class="box-body">

    <div class="form-group">
        {{ Form::label('gestion', 'Gestión', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('gestion', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el gestion']) }}
        </div>
    </div>


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
        </div>
    </div>
    
</div>