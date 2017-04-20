<div class="box-body">

    <div class="form-group">
        {{ Form::label('nombre', 'Nombre', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('categoria_id', 'Categoría', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::select('categoria_id', $listaCategoria, null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
        {!! Form::textarea('descripcion',null,['class'=>'form-control ', 'rows' => 5, 'cols' => 40]) !!}

        </div>
    </div>
    <div class="form-group">
        {{ Form::label('estado', 'Estado', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('estado', '1', true) }} Activo
            {{ Form::radio('estado', '0') }}
            Inactivo

        </div><!--col-lg-10-->
    </div><!--form control-->
    
</div>