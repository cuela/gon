<div class="box-body">
        {{ Form::hidden('denuncia_id', $denuncia->id) }}
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción del seguimiento', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('descripcion',null,['class'=>'form-control tiny-descripcion', 'rows' => 5, 'cols' => 40]) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('archivo', 'Archivo Boletín ', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::file('archivo') }}
            @if(isset($seguimientoDenuncia))
                @if($seguimientoDenuncia->archivo)
                    <a href="{{asset($seguimientoDenuncia->archivo)}}" target="_blank">Descargar Archivo</a>
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
