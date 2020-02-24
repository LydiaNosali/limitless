@extends('layouts.app', ['activePage' => 'document', 'titlePage' => __('Document')])
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
                        <div class="card-header " data-color="orange">
                            <h4 class="card-title ">Annuler un document</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('document') }}" class="btn btn-sm btn-warning">{{ __('Revenir en arriére') }}</a>
                                </div>
                            </div>
                            <div class="col-8">

                        <form action="/document/annuler" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">

                                <label for="document" class="col-md-3 col-form-label ">Nom du Document</label>
                                <div class="col-sm-7">
                                    <div class="input-group">

                                        <input id="document" name="document" type="text" class="form-control" placeholder="Document"/>

                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $( "#document" ).autocomplete({

                                                source: function(request, response) {
                                                    $.ajax({
                                                        url: "{{url('autocompleted')}}",
                                                        data: {
                                                            term : request.term
                                                        },
                                                        dataType: "json",
                                                        success: function(data){
                                                            var resp = $.map(data,function(obj){

                                                                return obj.document;

                                                            });
                                                            response(resp)
                                                            ;}});},
                                                minLength: 1
                                            });});


                                    </script>

                                </div>
                            </div>
                            <div class="row">

                                <label for="repertoire" class="col-md-3 col-form-label ">Nom du repertoire</label>
                                <div class="col-sm-7">
                                    <div class="input-group">

                                        <input id="repertoire" name="repertoire" type="text" class="form-control" placeholder="Repertoire"/>

                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $( "#repertoire" ).autocomplete({

                                                source: function(request, response) {
                                                    $.ajax({
                                                        url: "{{url('autocomplete')}}",
                                                        data: {
                                                            term : request.term
                                                        },
                                                        dataType: "json",
                                                        success: function(data){
                                                            var resp = $.map(data,function(obj){

                                                                return obj.repertoire;

                                                            });
                                                            response(resp)
                                                            ;}});},
                                                minLength: 1
                                            });});


                                    </script>

                                </div>
                            </div>
                        </form>

                            <div class="row pt-4">
                                <button  type="submit" class="btn btn-warning">Annuler document</button>

                            </div>


                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>



    </div>
    </div>
@endsection

