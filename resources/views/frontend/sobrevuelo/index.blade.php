@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb breadcrumb2">
    <li><a href="{{route('frontend.index')}}">Inicio</a></li>
    <li class="active">Sobrevuelos</li>
    </ol>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h3 class="titulo">Sobrevuelos</h3>
            <h4>{{$cliente->nombre}}</h4>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <p>
                Dirección: {{$cliente->direccion}}<br/>
                Teléfono: {{$cliente->telefono}}
            </p>
        </div>

    </div>

    <div class="row">
        
        <div class="col-xs-6 col-sm-6 col-md-6">
            <h4>Notas de Débito</h4> 
            <ul>
            @foreach($listaNotaDebito as $notaDebito)
                <li><a href="#" onclick="agregarOpcion('{{$notaDebito->id}}')">{{$notaDebito->glosa}}</a></li>
            @endforeach
            </ul>
            {{$listaNotaDebito->appends(['page_nota' => $listaNotaDebito->currentPage()])->links()}}    
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                   <h4>Estado</h4> 
                    <div id="estado"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h4>Sobrevuelos</h4> 
            <table class="table">
            <tr><th>Fecha</th><th>Matricula</th><th>Origen</th><th>Destino</th></tr>
            @foreach($listaSobrevuelo as $sobrevuelo)
                <tr><td>{{$sobrevuelo->fecha}}</td><td>{{$sobrevuelo->matricula}}</td><td>{{$sobrevuelo->origen}}</td><td>{{$sobrevuelo->destino}}</td></tr>
            @endforeach
            </table>
            {{$listaSobrevuelo->appends(['page_sobrevuelo' => $listaSobrevuelo->currentPage()])->links()}}  
        </div>

    </div>
</div>
@stop

@section('after-scripts-end')
    <script>
        $('[data-toggle="modal"]').click(function(e) {
            event.preventDefault();
            var url = $(this).attr("href");
            var urlGeneral = "http://docs.google.com/gview?url="+url+"&embedded=true";
            console.log(urlGeneral);
             $('#pdf').attr('src',urlGeneral);   
            // return false;
        });
    </script>


    <script>
        function agregarOpcion(id){
            var url = '{{route("frontend.estadoSobrevuelo")}}';
            $.ajax({
                url: url,
                data:{notaId:id},
                type: 'get',
                success: function(data) {
                   $('#estado').html(data);
                }
            });
        }

    </script>
@stop
