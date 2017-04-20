<div class="box-body">

    <div class="form-group">
        {{ Form::label('nombres', 'Nombres', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombres']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('apellido_paterno', 'Apellido Materno', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Apellido Materno']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('apellido_materno', 'Apellido Paterno', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Apellido Paterno']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('carnet', 'Cedula de Identidad', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('carnet', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el carnet']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('telefono', 'Telefono Fijo / Celular', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el telefono']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('correo', 'Correo Electrónico', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('correo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el correo']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('denunciados', 'Denunciados', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('denunciados', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el denunciados']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción de la Denuncia', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('descripcion',null,['class'=>'form-control tiny-descripcion', 'rows' => 5, 'cols' => 40]) !!}
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
            {{ Form::radio('estado', '1', true) }} Creado
            {{ Form::radio('estado', '2') }}                       Recepcionado
            {{ Form::radio('estado', '3') }}                       Proceso
            {{ Form::radio('estado', '4') }}                       Finalizado

        </div>
    </div>
    
</div>
