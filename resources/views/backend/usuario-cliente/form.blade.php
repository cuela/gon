<div class="box-body">

    <div class="form-group">
        {{ Form::label('nombres', 'Nombres', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombres']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('apellido_paterno', 'Apellido Paterno', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Apellido Paterno']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('apellido_materno', 'Apellido Materno', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Apellido Materno']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('carnet', 'Cedula de Identidad', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('carnet', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Cedula de Identidad']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('telefono', 'Teléfono', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Teléfono']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('correo', 'Correo Electrónico', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('correo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Correo Electrónico']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('denuncia', 'Denuncia', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('denuncia',null,['class'=>'form-control tiny-denuncia', 'rows' => 5, 'cols' => 40]) !!}
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
    </div><!--form control-->
    
</div>
