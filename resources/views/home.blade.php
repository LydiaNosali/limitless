@extends('Downloads.material-dashboard-laravel-master.material-dashboard-laravel-master.src.material-stubs.resources.views.layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Limitless')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card card-login card-hidden mb-3">
        <div class="card-header text-center">
          <h4>Dashboard</h4>
        </div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          Vous êtes désormais connecter
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
