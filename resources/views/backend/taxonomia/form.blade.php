<div class="box-body">

    <div class="form-group">
        {{ Form::label('padre_id', 'Nodo Padre', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <select type="text" id="padre_id" class="form-control" name="padre_id">
                {!!$listaPadre!!}
            </select>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('url_alias', 'URL Alias', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('url_alias', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el url_alias']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('imagen', 'Miniatura', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::file('imagen') }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('descripcion',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('seo_palabras_clave', 'SEO Palabras Clave', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('seo_palabras_clave', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el seo_palabras_clave']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('seo_descripcion', 'SEO Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('seo_descripcion', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el seo_descripcion']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('contenidos', 'Resumen', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('contenidos',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('orden', 'Orden', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('orden', $maximo, ['class' => 'form-control', 'placeholder' => 'Introduzca el orden']) }}
        </div>
    </div>
    {{ Form::hidden('categoria_id', session()->get('taxCategoriaId')) }}
</div>