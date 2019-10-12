<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://www.alsalamalgeria.com/" class="simple-text logo-normal">
      {{ __('AL SALAM BANK') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage ?? '' == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Acceuil') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage ?? '' == 'profile' || $activePage ?? '' == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/ALSALAMBANK.png"></i>
          <p>{{ __('Gestion des employes') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage ?? '' == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage ?? '' == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Gestion de utilisateur') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage ?? '' == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Liste des agences') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage ?? '' == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
        <li class="nav-item {{ $activePage ?? '' == 'document' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('document') }}">
                <i class="material-icons">unarchived</i>
                <p>{{ __('Document') }}</p>
            </a>
        </li>
        <li class="nav-item {{ $activePage ?? '' == 'repertoire' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('repertoire') }}">
                <i class="material-icons">folder</i>
                <p>{{ __('Repertoire') }}</p>
            </a>
        </li>
    <!--  <li class="nav-item{{ $activePage ?? '' == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
    <li class="nav-item{{ $activePage ?? '' == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>-->

    </ul>
  </div>
</div>
