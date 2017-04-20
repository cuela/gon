
    <table class="table table-hover">
        <thead>
            <tr>
                <th>N°</th>
                <th>Boletín</th>
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
                    <div class="media">
                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset($boletin->imagen)}}" style="width: 72px;"> </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$boletin->titulo}}</h4>
                            <h5 class="media-heading">{{$boletin->descripcion}}</h5>
                        </div>
                    </div>
                </td>
                
                <td class="col-sm-1 col-md-1">
                <div>
                
                        @if($boletin->estado == 1)
                            <a href="{{$boletin->archivo}}" class="btn btn-success" target="_blank">
                             <img src="{{asset('img/frontend/download.png')}}">    Descargar
                            </a>
                        @else
                            @if ($logged_in_user)
                                @if(isset($boletinSolicitado))
                                    @if($boletinSolicitado->estado == 1)
                                        @if($fechaSistema >= $boletinSolicitado->fecha_inicio_activacion && $fechaSistema <= $boletinSolicitado->fecha_fin_activacion)
                                        <a href="{{$boletin->archivo}}" class="btn btn-success" target="_blank">
                                           <img src="{{asset('img/frontend/download.png')}}"> Descargar
                                        </a>
                                        @else
                                            El Periodo de habilitación se termino
                                            <a href="{{route('frontend.boletin.solicitar')}}">
                                            Solicitar un nuevo acceso Boletín
                                            </a>    
                                        @endif
                                    @else
                                        <span class="label label-warning">Su solicitud se encuentra en revisión</span>
                                    @endif
                                @else
                                    <a href="{{route('frontend.boletin.solicitar')}}">
                                    Solicitar Boletín
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
            @else
            <tr><td colspan="4"><i>No contiene Boletines AIP</i></td></tr>
            @endif
            
        </tbody>
    </table>