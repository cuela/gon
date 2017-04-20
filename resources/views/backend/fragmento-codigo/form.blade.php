<div class="box-body">

    <div class="form-group">
        {{ Form::label('titulo', 'Título', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el titulo']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('contenido', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('contenido',null,['class'=>'form-control ', 'rows' => 10, 'cols' => 40]) !!}
        </div><!--col-lg-10-->
    </div><!--form control-->

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
            {{ Form::radio('estado', '0') }}
            Deshabilitado

        </div><!--col-lg-10-->
    </div><!--form control-->
    
</div>