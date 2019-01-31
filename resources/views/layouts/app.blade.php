<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <v-app id="inspire">
        <v-navigation-drawer
          v-model="drawer"
          fixed
          app
        >
          <v-list dense>
            @auth
            <v-list-tile @click="">
              <v-list-tile-action>
                <v-icon>home</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title><a href="{{route('home')}}">Home</a></v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          @endauth
          @guest
            <v-list-tile @click="">
              <v-list-tile-action>
                <v-icon>contact_mail</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title><a class="main-icon" href="{{route('login')}}">Ingresar</a></v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
            @if (Route::has('register'))
            <v-list-tile @click="">
              <v-list-tile-action>
                <v-icon>home</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title><a href="{{route('register')}}">Registro</a></v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
            @endif
          @else
            <v-list-tile @click="">
              <v-list-tile-action>
                <v-icon>contact_mail</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                 Cerrar sesión</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form></v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          @endguest
          </v-list>
        </v-navigation-drawer>
        <v-toolbar color="indigo" dark fixed app>
          <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
          <v-toolbar-title>
              {{ config('app.name', 'Laravel') }}
          </v-toolbar-title>
        </v-toolbar>
        <v-content>
          <v-container fluid fill-height>
            <v-layout
              justify-center
              align-center
            >
              <v-flex text-xs-center>
                {{-- <v-tooltip left>
                  <v-btn slot="activator" :href="source" icon large target="_blank">
                    <v-icon large>code</v-icon>
                  </v-btn>
                  <span>Source</span>
                </v-tooltip>
                <v-tooltip right>
                  <v-btn slot="activator" icon large href="#" target="_blank">
                    <v-icon large>mdi-codepen</v-icon>
                  </v-btn>
                  <span>Codepen</span>
                </v-tooltip> --}}
                @yield('content')
              </v-flex>
            </v-layout>
          </v-container>
        </v-content>
        <v-footer color="indigo" app>
          <v-layout
          justify-center
          align-center
          >
            <span class="white--text">Tecnovulario | &copy; 2019</span>
          </v-layout>
        </v-footer>
      </v-app>

        {{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main> --}}
    </div>
</body>
</html>
