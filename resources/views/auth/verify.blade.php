@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('AL SALAM BANK')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-info text-center">
              <p class="card-title"><strong>{{ __('Verifiez Votre Adresse Email ') }}</strong></p>
            </div>
            <div class="card-body">
              <p class="card-description text-center"></p>
              <p>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Un lien de verification a été envoyé à votre adresse email.') }}
                    </div>
                @endif

                {{ __('Avant de continuer, veuillez vérifier votre email pour le lien de vérification.') }}

                @if (Route::has('verification.resend'))
                    {{ __('Si vous n"avez pas reçu l"email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour demander un autre') }}</button>.
                    </form>
                @endif
              </p>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
