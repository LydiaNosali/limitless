@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Gestion des utilisateurs')])

@section('content')
    <script type="text/javascript">
        function showHide(value){
            if (value==="client") {
                document.getElementById('client').style.display = 'inline';
                document.getElementById('date').style.display = 'inline';
            }
            else {
                document.getElementById('client').style.display = 'none';
                document.getElementById('date').style.display = 'none';
            }
        }
    </script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header-warning ">
                                <h4 class="card-title">{{ __('Ajouter un utilisateur') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-warning">{{ __('Revenir à la liste') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Role') }}</label>
                                    <div class="col-sm-7">
                                        <div>
                                            <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                                <select class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" id="input-role" required="true" aria-required="true" onchange="showHide(this.value);">
                                                    <option value="admin">Admin</option>
                                                    <option value="client">Client</option>
                                                    <option value="comptable">Comptable</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="display: none;" id="client">
                                    <label for="compta_id" class="col-sm-3 col-form-label ">Nom du comptable</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('compta_id') ? ' has-danger' : '' }}">
                                            <div class="input-group" >
                                                <input id="compta_id" name="compta_id" type="text" class="form-control" placeholder="Comptable" />
                                            </div>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $( "#compta_id" ).autocomplete({

                                                        source: function(request, response) {
                                                            $.ajax({
                                                                url: "{{url('autocompletededed')}}",
                                                                data: {
                                                                    term : request.term
                                                                },
                                                                dataType: "json",
                                                                success: function(data){
                                                                    var resp = $.map(data,function(obj){
                                                                        return obj.name;
                                                                    });
                                                                    response(resp)
                                                                    ;}});},
                                                        minLength: 1
                                                    });});


                                            </script>

                                        </div>
                                        </div>

                                </div>
                                <div class="row" style="display: none;" id="date">
                                    <label class="col-sm-3 col-form-label">{{ __('Date de fin d\'abonnement') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" type="date" id="start" name="date"
                                                    placeholder="{{ __('Date de fin d\'abonnement') }}"  />
                                            @if ($errors->has('date'))
                                                <span id="date-error" class="error text-danger" for="input-date">{{ $errors->first('date') }}</span>
                                            @endif
                                        </div>
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
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label" for="input-password">{{ __(' Mot de passe') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Mot de passe') }}" value="" required />
                                            @if ($errors->has('password'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label" for="input-password-confirmation">{{ __('Confirmer mot de passe') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirmer mot de passe') }}" value="" required />
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
