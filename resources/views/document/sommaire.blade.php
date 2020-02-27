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
                                        {{ __('Nom du client') }}
                                    </th>
                                    <th>
                                        {{ __('Nom') }}
                                    </th>
                                    <th>
                                        {{ __('Comptabilisé') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    use App\Document;
                                    use App\User;
                                    $clients=User::where([['compta_id','=',auth()->id()]])
                                        ->get();
                                    $documents=Document::get();
                                    foreach ($clients as $client) {
                                     foreach($documents as $document ) {
                                        if ($document->client_id===$client->id){ ?>
                                        <tr>
                                            <td>
                                                {{ $client->name }}
                                            </td>
                                            <td>
                                                {{ $document->document }}
                                            </td>
                                            <td>
                                                {{ $document->compta }}
                                            </td>

                                            <td class="td-actions text-right">
                                                    <form action="" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </form>
                                            </td>
                                        </tr>
                                    <?php }}} ?>
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
