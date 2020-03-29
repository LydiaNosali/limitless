@extends('layouts.app', ['activePage' => 'salaire-management', 'titlePage' => __('Gestion des utilisateurs')])

@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('salaire.update', $salaire) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header-warning ">
                                <h4 class="card-title">{{ __('Modifier salairiée') }}</h4>
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
                                        <div class="form-group{{ $errors->has('nom') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" id="input-nom" type="text" placeholder="{{ __('Nom et Prénom') }}" value="{{ old('nom', $salaire->nom) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('nom'))
                                                <span id="nom-error" class="error text-danger" for="input-nom">{{ $errors->first('nom') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-warning">{{ __('Enregistrer') }}</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
