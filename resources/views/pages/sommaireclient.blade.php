@extends('layouts.app', ['activePage' => 'document', 'titlePage' => __('Document')])
@section('content')
    <div class="content">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('document') }}" class="btn btn-sm btn-warning">{{ __('Revenir en arriére') }}</a>
                                </div>
                            </div>
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Nom') }}
                                    </th>
                                    <th>
                                        {{ __('Comptabilisé') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    use App\Document;
                                    $documents=Document::get();?>
                                     @foreach($documents as $document )
                                        @if ($document->client_id===auth()->id())
                                        <tr>
                                            <td>
                                                {{ $document->document }}
                                            </td>
                                            <td>
                                                {{ $document->compta }}
                                            </td>
                                        </tr>
                                        @endif
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
