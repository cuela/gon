@extends('frontend.layouts.app')


@section('content')
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">Contacto</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div>
            <p>
            Bienvenido al formulario de contactos. Desde aqui usted podra realizar su requerimiento: realizar sus consultas, formular sus reclamos, opiniones, sugrencias y felicitaciones.
            </p>
            <p>
            Agradecemos llenar cada uno de los campos del formulario para otorgarle una pronta respuesta. Los campos con * son obligatorios.
            </p>
        </div>
        {{ Form::open(['route' => 'frontend.guardarContacto', 'class' => 'form-horizontal', 'denuncia' => 'form', 'method' => 'post', 'id' => 'create-denuncia']) }}
        {{ csrf_field() }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Solicitar</h3>
                </div>
                <div class="box-body">

                <div class="form-group">
                    {{ Form::label('nombres', 'Nombres (*)', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombres']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('telefono', 'Telefono Fijo / Celular', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el telefono']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('correo', 'Correo Electrónico (*)', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('correo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el correo']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('empresa', 'Empresa', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('empresa', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el empresa']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('pais_id', 'País', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::selectCountryAlpha('pais_id', 'ISO 3166-2:BO', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('asunto', 'Asunto (*)', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('asunto', ['consulta' => 'Consulta', 'reclamo' => 'Reclamo', 'sugerencia' => 'Sugerencia', 'felicitacion' => 'Felicitación', 'otros' => 'Otros'], null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('solicitud', 'Descripción de la solicitud (*)', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {!! Form::textarea('solicitud',null,['class'=>'form-control tiny-solicitud', 'rows' => 5, 'cols' => 40]) !!}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Captcha</label>

                    <div class="col-md-6">
                        {!! captcha_image_html('ContactCaptcha') !!}
                        <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode" style="margin-top:5px;">

                        @if ($errors->has('CaptchaCode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('CaptchaCode') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
    
                </div>

            </div><!--box-->

            <div class="box box-success">
                <div class="box-body">

                    <div class="pull-right">
                        {{ Form::submit('Solicitar', ['class' => 'btn btn-success btn-xs']) }}
                    </div><!--pull-right-->

                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
            </div><!--box-->

        
    </div>
</div>
@stop