@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div>
            <p>
            Lo sentimos, acceso no autorizado.
            </p>
            <p>Puede  {{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}  o 
                {{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }} para ver el contenido</p>
        </div>
        
    </div>
</div>
@stop