@section('after-styles-end')
    {{ Html::style("js/backend/plugin/datepicker/datepicker3.css") }}
    {{ Html::style("js/backend/plugin/timepicker/bootstrap-timepicker.min.css") }}
    {{ Html::script("js/backend/plugin/tinymce/tinymce.min.js") }}
@stop
<div class="box-body">

    <div class="form-group">
        {{ Form::label('titulo', 'Título / Nombre Convocatoria', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el título']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('resumen', 'Resumen', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('resumen',null,['class'=>'form-control tiny-denuncia', 'rows' => 5, 'cols' => 40]) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('descripcion',null,['class'=>'form-control tiny-cuerpo', 'rows' => 5, 'cols' => 40]) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('fecha_inicio', 'Fecha Inicio', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('fecha_inicio', null, ['class' => 'form-control datepicker', 'placeholder' => 'Introduzca la fecha de publicación']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('fecha_fin', 'Fecha Fin', ['class' => 'col-lg-2 control-label ']) }}

        <div class="col-lg-10">
            {{ Form::text('fecha_fin', null, ['class' => 'form-control datepicker', 'placeholder' => 'Introduzca la fecha límite de presentación' ]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lugar', 'Lugar de Presentación', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('lugar', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el lugar de presentación']) }}
        </div>
    </div>
            {{ Form::hidden('orden', $maximo) }}
    <div class="form-group">
        {{ Form::label('estado', 'Estado', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::radio('estado', '1', true) }} Habilitado
            {{ Form::radio('estado', '0') }}
            Deshabilitado
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('archivo', 'Documentos', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <table class="table table-bordered" id="dynamic_field">  
               @if(isset($listaMedia))
               @foreach ($listaMedia as $media)
                    <tr>  
                         <td><a href="{{asset($media->ruta.'/'.$media->nombre_archivo)}}" target="_blank">{{$media->nombre_original}}</a></td>  
                         <td></td>
                    </tr>
                @endforeach
               @endif
                <tr>  
                     <td><input type="file" name="archivo[]"  class="form-control name_list" /></td>  
                     <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  
                </tr>  
           </table>
        </div>
    </div>
    
</div>

@section('after-scripts-end')
{{ Html::script("js/backend/plugin/datepicker/bootstrap-datepicker.js") }}
{{ Html::script("js/backend/plugin/timepicker/bootstrap-timepicker.min.js") }}

<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="file" name="archivo[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
 });  
 </script> 
 <script>
    $('#fecha_inicio').datepicker({
        
        autoclose: true,
        format: "dd/mm/yyyy",
    forceParse: false,
    language: "es",
    });
    $('#fecha_fin').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy",
    forceParse: false,
    language: "es",
        
    });
</script>
        <script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.tiny-cuerpo",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }
      console.log(cmsURL);

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@stop
