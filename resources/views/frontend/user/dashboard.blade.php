@extends('frontend.layouts.app')

@section('content')
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-primary">
                <div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>

                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-4 col-md-push-8">

                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="{{ $logged_in_user->picture }}" alt="Profile picture">
                                    </div><!--media-left-->

                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            {{ $logged_in_user->name }}<br/>
                                            <small>
                                                {{ $logged_in_user->email }}<br/>
                                                Joined {{ $logged_in_user->created_at->format('F jS, Y') }}
                                            </small>
                                        </h4>

                                        {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-xs']) }}

                                        @permission('view-backend')
                                            {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-xs']) }}
                                        @endauth
                                    </div><!--media-body-->
                                </li><!--media-->
                            </ul><!--media-list-->

                        </div><!--col-md-4-->

                        <div class="col-md-8 col-md-pull-4">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>Bienvenido al Panel Principal</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <p>En esta área podras acceder a los servicios principales que Ofrece AASANA para todos nuestros usuarios registrados</p>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-xs-12-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            <h4>Información Aeronáutica (AIP)</h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <p>La AIP de la Bolivia, se publica de acuerdo a los lineamientos establecidos por AASANA.
                                                <br>
                                                La AIP Bolivia contiene información de alcance internacional.</p>
                                                <p><a href="#" class="btn btn-warning btn-lg">Ingresar</a></p>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->

                                <div class="col-md-6">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h4>Comercial Sobrevuelos </h4>
                                        </div><!--panel-heading-->

                                        <div class="panel-body">
                                            <p>En esta sección podra consultar las estadísticas de tráfico aéreo en los aeropuertos que gestiona AASANA.</p>
                                            <p><a href="#" class="btn btn-success btn-lg">Ingresar</a></p>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div><!--col-md-6-->

                            </div><!--row-->

                        </div><!--col-md-8-->

                    </div><!--row-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection