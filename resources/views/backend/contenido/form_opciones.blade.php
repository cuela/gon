<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Opciones de Salida</h3>
  </div>
    <div class="box-body">
      <div class="form-group">
        <div class="col-lg-12">
            {{ Form::label('taxonomia_id', 'Código de Categoría', ['class' => 'col-lg-12 control-label', 'style'=>'text-align: left; ']) }}
            <select type="text" id="taxonomia_id" class="form-control" name="taxonomia_id">
                {!!$listaTaxonomia!!}
            </select>
        </div>
        <div class="col-lg-12">
            {{ Form::label('estado', 'Estado', ['class' => 'col-lg-12 control-label', 'style'=>'text-align: left; ']) }}
            {{ Form::select('estado', $listaEstado,null,['class'=>'form-control']) }}
          
        </div>
        <div class="col-lg-12">
            {{ Form::label('permitir_comentario', 'Comentario', ['class' => 'col-lg-12 control-label', 'style'=>'text-align: left; ']) }}
            {{ Form::select('permitir_comentario', ['0'=>'No', '1'=>'Si'],null,['class'=>'form-control']) }}
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <div class="col-lg-12">
                {{ Form::label('orden', 'Secuencia', ['class' => 'col-lg-12 control-label', 'style'=>'text-align: left; ']) }}
                {{ Form::text('orden', $maximo, ['class' => 'form-control', 'placeholder' => 'Introduzca el orden']) }}
            </div>
          </div>    
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <div class="col-lg-12">
                {{ Form::label('titular', 'Artículo Destacado', ['class' => 'col-lg-12 control-label', 'style'=>'text-align: left; ']) }}
                {{ Form::select('permitir_comentario', ['0'=>'No', '1'=>'Si'],null,['class'=>'form-control']) }}
            </div>
          </div>
        </div>
      </div>
      
    </div>
</div>

<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Configuración del SEO</h3>
  </div>
    <div class="box-body">
      <div class="form-group">
        <div class="col-lg-12">
            {{ Form::label('seo_titulo', 'SEO título', ['class' => 'col-lg-12 control-label', 'style'=>'text-align: left; ']) }}
            {{ Form::text('seo_titulo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el seo_titulo']) }}
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-12">
            {{ Form::label('seo_palabras_clave', 'SEO palabras clave', ['class' => 'col-lg-12 control-label', 'style'=>'text-align: left; ']) }}
            {{ Form::text('seo_palabras_clave', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el seo_palabras_clave']) }}
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-12">
            {{ Form::label('seo_descripcion', 'SEO descripción', ['class' => 'col-lg-12 control-label', 'style'=>'text-align: left; ']) }}
            {!! Form::textarea('seo_descripcion',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
        </div>
      </div>
    </div>
</div>