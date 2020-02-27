@extends('layouts.app', ['activePage' => 'salaire-management', 'titlePage' => __('Gestion des salariés')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('salaire.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header-warning ">
                                <h4 class="card-title">{{ __('Ajouter un salariée') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('salaire.index') }}" class="btn btn-sm btn-warning">{{ __('Revenir à la liste') }}</a>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Nom et Prénom') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nom et Prénom') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-warning">{{ __('Ajouter utilisateur') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection