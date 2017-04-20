<div class="box-body">
        {{ Form::hidden('odeco_id', $odeco->id) }}
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción del seguimiento', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('descripcion',null,['class'=>'form-control tiny-descripcion', 'rows' => 5, 'cols' => 40]) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('archivo', 'Archivo', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::file('archivo') }}
            @if(isset($seguimientoOdeco))
                @if($seguimientoOdeco->archivo)
                    <a href="{{asset($seguimientoOdeco->archivo)}}" target="_blank">Descargar Archivo</a>
                @endif
            @endif
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('estado', 'Estado', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('estado', '1', true) }} Activo
            {{ Form::radio('estado', '0') }}   Inactivo

        </div>
    </div>
</div>
