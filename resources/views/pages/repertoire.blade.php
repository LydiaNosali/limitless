@extends('layouts.app', ['activePage' => 'repertoire', 'titlePage' => __('Repertoire')])
@section('content')
    <div class="content">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <div class="container-fluid">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Sommaire des repertoires</h4>
                        </div>
                        <div class="card-body">

                            <div  class="row pt-10 col-md-10" >

                                    <button   class="btn btn-xs btn-info pull-right"
                                             onclick="window.location='{{ url("repertoire/sommaire") }}'"><i class="material-icons">view_list</i> Voir le sommaire des repertoires</button>
                                </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Créer un repertoire</h4>
                        </div>
                        <div class="card-body">
                            <div  class="row pt-10 col-md-10" >
                                <button   class="btn btn-xs btn-info pull-right"
                                          onclick="window.location='{{ url("repertoire/create") }}'"> <i class="material-icons">folder</i> Créer un repertoire</button>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Supprimer un repertoire</h4>
                        </div>
                        <div class="card-body">
                            <div  class="row pt-10 col-md-10" >
                                <button   class="btn btn-xs btn-info pull-right"
                                          onclick="window.location='{{ url("repertoire/supprimer") }}'"> <i class="material-icons">delete</i> Supprimer un repertoire</button>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
    </div>
    </div>

@endsection


