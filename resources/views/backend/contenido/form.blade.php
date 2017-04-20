{{ Html::script("js/backend/plugin/tinymce/tinymce.min.js") }}
<div class="box-body">

    <div class="form-group">
        {{ Form::label('titulo', 'Título', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el titulo']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('subtitulo', 'Sub Título', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('subtitulo', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el subtitulo']) }}
        </div>
    </div>
    
    <div class="form-group">
        {{ Form::label('imagen', 'Imágen Destacada', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::file('imagen') }}
            @if(isset($contenido))
                @if($contenido->imagen)
                    <img src="{{$contenido->imagen}}" width="100px">
                @endif
            @endif
        </div>
    </div>
        <div class="form-group">
            {{ Form::label('cuerpo', 'Cuerpo', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {!! Form::textarea('cuerpo',null,['class'=>'form-control tiny-cuerpo', 'rows' => 16, 'cols' => 40]) !!}
            </div>
        </div>
    <div class="form-group">
        {{ Form::label('resumen', 'Resumen', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {!! Form::textarea('resumen',null,['class'=>'form-control ', 'rows' => 2, 'cols' => 40]) !!}
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
@section('after-scripts-end')
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
@stop
