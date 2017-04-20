@extends('frontend.layouts.app')

@section('content')
<div class="container">
<ol class="breadcrumb breadcrumb2">
  <li><a href="{{route('frontend.index')}}">Inicio</a></li>
  <li class="active">Listado de Boletines</li>
</ol>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h3 class="titulo">Información Aeronáutica (AIP)</h3>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <ul class="list-group">
            {!!$listaCategoria!!}
        </ul>
    </div>
    <div class="col-xs-9 col-sm-9 col-md-9">
        <div id="resultado">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Boletín</th>
                        <th>Vista Previa</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                     @if(isset($listaBoletin))
                    <?php $contador = 1; ?>
                    @foreach($listaBoletin as $boletin)
                    <tr>
                        <td class="col-md-2">{{$contador}}</td>
                        <td class="col-sm-8 col-md-6">
                            <div >
                                <a class="thumbnail pull-left" href="#" style="margin:5px;"> <img  src="{{asset($boletin->imagen)}}" style="width: 72px;"> </a>
                                <div class="media-body" >
                                    <h4 class="media-heading">{{$boletin->titulo}}</h4>
                                    <h5 class="media-heading">{!!$boletin->descripcion!!}</h5>
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-1 col-md-1">
                        @if($boletin->estado==1)
                        <a href="{{asset($boletin->archivo)}}" class="modal_vista_previa"  data-toggle="modal" data-target="#myModal">Vista Previa</a>
                        @endif
                        </td>
                        <td class="col-sm-1 col-md-1">
                        <div>
                        
                                @if($boletin->estado == 1)
                                    <a href="{{$boletin->archivo}}" class="btn btn-success" target="_blank">
                                       <img src="{{asset('img/frontend/download.png')}}"> Descargar
                                    </a>
                                @else
                                    @if ($logged_in_user)
                                        @if(isset($boletinSolicitado))
                                            @if($boletinSolicitado->estado == 1)
                                                <a href="{{$boletin->archivo}}" class="btn btn-success" target="_blank">
                                                   <img src="{{asset('img/frontend/download.png')}}"> Descargar
                                                </a>
                                            @endif

                                            @if($boletinSolicitado->estado == 2)
                                                <span class="label label-warning">Su solicitud se encuentra en revisión</span>
                                            @endif

                                            @if($boletinSolicitado->estado == 3)
                                                El Periodo de habilitación se termino
                                                <a href="{{route('frontend.boletin.solicitar')}}">
                                                Solicitar un nuevo acceso Boletín
                                                </a>    
                                            @endif
                                        @else
                                            <a href="{{route('frontend.boletin.solicitar')}}">
                                           <img src="{{asset('img/frontend/error.png')}}"> Solicitar Boletín
                                            </a>
                                        @endif
                                        
                                    @else
                                        Para acceder al documento debe:
                                        {{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}  o 
                                        {{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}
                                    @endif
                                   
                                @endif
                            </div>
                        </td>
                    </tr>
                   
                    <?php $contador++;?>
                    @endforeach
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div style="background-color: #fff;    border: 1px solid rgba(0, 0, 0, 0.2);">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Vista Previa</h4>
      </div>
      <div class="modal-body">
        <iframe id="pdf" src="" width="100%" height="400">
</iframe>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('after-scripts-end')
{{ Html::script("/vendor/PDFObject/pdfobject.min.js") }}
    <script>
        $('[data-toggle="modal"]').click(function(e) {
            event.preventDefault();
            var url = $(this).attr("href");
            console.log(url);
             $('#pdf').attr('src',url);   
            // return false;
        });
    </script>


    <script>
        function listaBoletinPorCategoria(id){
            var url = '{{route("frontend.boletin.categoria")}}';
            $.ajax({
                url: url,
                data:{id:id},
                type: 'get',
                success: function(data) {
                   $('#resultado').html(data);
                }
            });
        }

    </script>
@stop
