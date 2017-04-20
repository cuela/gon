<div class="box-body">

    <div class="form-group">
        {{ Form::label('titulo', 'Título', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el titulo']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el descripcion']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('imagen', 'Imágen ', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::file('imagen') }}
            @if(isset($boletin))
                @if($boletin->imagen)
                    <img src="{{asset($boletin->imagen)}}" width="100px">
                @endif
            @endif
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('archivo', 'Archivo Boletín ', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::file('archivo') }}
            @if(isset($boletin))
                @if($boletin->archivo)
                    <a href="{{asset($boletin->archivo)}}" target="_blank">Descargar Boletín</a>
                @endif
            @endif
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('precio', 'Costo (Bs)', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('precio', $maximo, ['class' => 'form-control', 'placeholder' => 'Introduzca el precio']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('orden', 'Orden', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('orden', $maximo, ['class' => 'form-control', 'placeholder' => 'Introduzca el orden']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('fecha_inicio_activacion', 'Fecha Inicio de Activación', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('fecha_inicio_activacion', null, ['class' => 'form-control datepicker', 'placeholder' => 'Introduzca la fecha de inicio de activación']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('fecha_fin_activacion', 'Fecha Fin de Activación', ['class' => 'col-lg-2 control-label ']) }}

        <div class="col-lg-10">
            {{ Form::text('fecha_fin_activacion', null, ['class' => 'form-control datepicker', 'placeholder' => 'Introduzca la fecha límite de activación' ]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('estado', 'Estado', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('estado', '1', true) }} Publico
            {{ Form::radio('estado', '0') }} Privado

        </div><!--col-lg-10-->
    </div><!--form control-->
    
    
</div>
@section('after-scripts-end')
{{ Html::script("js/backend/plugin/datepicker/bootstrap-datepicker.js") }}
 <script>
    $('#fecha_inicio_activacion').datepicker({  
        autoclose: true,
        format: "dd/mm/yyyy",
        forceParse: false,
        language: "es",
    });
    $('#fecha_fin_activacion').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy",
        forceParse: false,
        language: "es",
    });
</script>
@stop