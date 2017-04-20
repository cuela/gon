@section('after-styles-end')
    {{ Html::style("js/backend/plugin/datepicker/datepicker3.css") }}
    {{ Html::style("js/backend/plugin/timepicker/bootstrap-timepicker.min.css") }}
@stop
<div class="box-body">

    <div class="form-group">
        {{ Form::label('nombre', 'Nombres', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('apellido_paterno', 'Apellido Paterno', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el apellido_paterno']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('apellido_materno', 'Apellido Materno', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el apellido_materno']) }}
        </div>
    </div>
    <div class="form-group">
            {{ Form::label('estado_civil', 'Estado Civil', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::select('estado_civil', ['C'=>'Casado(a)', 'S'=>'Soltero(a)', 'D'=>'Divorciado(a)', 'V'=>'Viudo(a)'],null,['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('fecha_nacimiento', 'Fecha Nacimiento', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('fecha_nacimiento', null, ['class' => 'form-control datepicker', 'placeholder' => 'Introduzca el fecha_nacimiento']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('foto', 'Fotografía', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::file('foto') }}
            @if(isset($persona))
                @if($persona->foto)
                    <img src="{{asset($persona->foto)}}" width="100px">
                @endif
            @endif
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
@section('after-scripts-end')
{{ Html::script("js/backend/plugin/datepicker/bootstrap-datepicker.js") }}
{{ Html::script("js/backend/plugin/timepicker/bootstrap-timepicker.min.js") }}

 <script>
    $('#fecha_nacimiento').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy",
        forceParse: false,
        language: "es",
    });
</script>
@stop