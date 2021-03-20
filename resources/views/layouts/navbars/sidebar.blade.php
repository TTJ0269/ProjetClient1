<div class="sidebar" data-color="orange" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal"> <!--https://creative-tim.com/ --> 
      {{ __('election') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
        <table class="table">
                <thead>
                    <th scope="col"><img src="{{ asset('storage/' .Auth::user()->image) }}" alt="Image" class="img-thumbnail" width="70"></th>
                    <th scope="col">{{Auth::user()->nom}}</th>
                    <th scope="col">{{Auth::user()->prenom}}</th>
                </thead>
        </table>
           
      <ul class="nav">
     <!-- <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li> 
     <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li> 
       <li class="nav-item{{ $activePage == 'connexion' ? ' active' : '' }}">
        <a class="nav-link" href="/connexion">
          <i class="material-icons"></i>
            <p>{{ __('connexion') }}</p>
        </a>
      </li>-->
      
      <li class="nav-item{{ $activePage == 'votelimite' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('votelimite') }}">
          <i class="material-icons"></i>
            <p>{{ __('Limite-Vote') }}</p>
        </a>
        </li>
      <li class="nav-item{{ $activePage == 'republique' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('republiques.index') }}">
          <i class="material-icons"></i>
            <p>{{ __('Republique') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'region' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('regions.index') }}">
          <i class="material-icons"></i>
            <p>{{ __('Region') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'type_utilisateur' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('type_utilisateurs.index') }}">
          <i class="material-icons"></i>
            <p>{{ __('Type Utilisateur') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons"></i>
            <p>{{ __('Utilisateur') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'candidats' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('candidats.index') }}">
          <i class="material-icons"></i>
            <p>{{ __('Candidat') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'nombrevoteregion' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('nombrevoteregion') }}">
          <i class="material-icons"></i>
            <p>{{ __('Voix par Region') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'participervote' || $activePage == 'pasparticipervote') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravel" aria-expanded="true">
          <p>{{ __('Electeur-Vote') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravel">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'participervote' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('participer_vote') }}">
                <span class="sidebar-normal">{{ __('Voter') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'pasparticipervote' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('pasparticiper_vote') }}">
                <span class="sidebar-normal"> {{ __('Pas Voter') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

     <!--  <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons"></i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
       
     <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons"></i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
          <i class="material-icons text-white">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> -->
    </ul>
  </div>
</div>
