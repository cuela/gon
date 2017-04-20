{{ Html::script("js/backend/plugin/tinymce/tinymce.min.js") }}
<div class="box-body">

    <div class="form-group">
        {{ Form::label('titulo', 'Título', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el titulo']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('categoria_boletin_id', 'Categoría Boletín', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            <select type="text" id="categoria_boletin_id" class="form-control" name="categoria_boletin_id">
                {!!$listaCategoria!!}
            </select>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('descripcion',null,['class'=>'form-control tiny-cuerpo', 'rows' => 10, 'cols' => 40]) !!}
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
    {{ Form::hidden('orden', $maximo) }}
    <div class="form-group">
        {{ Form::label('visibilidad', 'Visibilidad', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('visibilidad', '1', true) }} <span class="label label-warning">Visible</span>
            {{ Form::radio('visibilidad', '2') }} <span class="label label-success">No Visible</span>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('estado', 'Estado', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('estado', '1', true) }} <span class="label label-primary">Público</span>
            {{ Form::radio('estado', '2') }} <span class="label label-danger">Privado</span>
        </div>
    </div>
    
    
</div>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.tiny-cuerpo",
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
    ],
    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    language:'es'
  };

  tinymce.init(editor_config);
</script>