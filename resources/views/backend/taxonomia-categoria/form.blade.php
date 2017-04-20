<div class="box-body">

    @if(!isset($taxonomiaCategoria))
    <div class="form-group">
        {{ Form::label('id', 'Código', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el id']) }}
        </div>
    </div>
    @else
        {{ Form::hidden('id', null) }}
    @endif
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('descripcion',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
        </div>
    </div>
    
</div>