<div class="box-body">

    <div class="form-group">
        {{ Form::label('nombre', 'Nombre', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('tipo', 'Tipo', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('tipo', '2', true) }} Fragmento Estático
            {{ Form::radio('tipo', '1') }}
            Fragmento de Código
        </div><!--col-lg-10-->
    </div><!--form control-->
    
</div>