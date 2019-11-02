@extends('layouts.app', ['activePage' => 'document', 'titlePage' => __('Document')])
@section('content')
    <div class="content" >
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <div class="container-fluid">
            @csrf

            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title ">Sommaire des documents</h4>
                        </div>
                        <div class="card-body">

                            <div  class="row pt-10 col-md-10" >
                                    <button   class="btn btn-xs btn-dark pull-right"
                                             onclick="window.location='{{ url("document/sommaire") }}'"><i class="material-icons">view_list</i> Voir le sommaire des documents</button>
                                </div>

                        </div>


                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title ">Ajouter un document</h4>
                        </div>
                        <div class="card-body">
                            <div  class="row pt-10 col-md-10" >
                                <button   class="btn btn-xs btn-dark pull-right"
                                          onclick="window.location='{{ url("document/create") }}'"><i class="material-icons">folder_open</i> Ajouter un document</button>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title ">Modifier un document</h4>
                        </div>
                        <div class="card-body">
                            <div  class="row pt-10 col-md-10" >
                                <button   class="btn btn-xs btn-dark pull-right"
                                          onclick="window.location='{{ url("document/modifier") }}'"><i class="material-icons">mouse</i> Modifier un document</button>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title ">Annuler un document</h4>
                        </div>
                        <div class="card-body">
                            <div  class="row pt-10 col-md-10" >
                                <button   class="btn btn-xs btn-dark pull-center"
                                          onclick="window.location='{{ url("document/annuler") }}'"><i class="material-icons">delete_outline</i> Annuler un document</button>
                            </div>
                        </div>


                    </div>

                </div>
    </div>
    </div>
    </div>

@endsection


