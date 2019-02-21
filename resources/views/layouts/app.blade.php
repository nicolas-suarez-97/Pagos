<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Paga todo') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <div class="info-container">
        @auth
          <input type="text" value="{{Auth::user()->name}}" v-model="user.name">
        @endauth
      </div>
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
            <v-list-tile @click="">
              <v-list-tile-action>
                <v-icon>person</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title><a href="{{route('home')}}">Perfil</a></v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
            @if(Auth::user()->hasRole('admin'))
              <v-list-tile @click="">
                <v-list-tile-action>
                  <v-icon>home</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title><a href="{{route('home')}}">Depositar</a></v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <v-list-tile @click="">
                <v-list-tile-action>
                  <v-icon>home</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title><a href="{{route('home')}}">Gestor de monedas</a></v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>

            @elseif (Auth::user()->hasRole('aliado'))

              <v-list-tile @click="">
                <v-list-tile-action>
                  <v-icon>send</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title><a href="{{route('home')}}">Enviar Transferencia</a></v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>

            @elseif (Auth::user()->hasRole('user'))
              <v-list-tile @click="">
                <v-list-tile-action>
                  <v-icon>get_app</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title><a href="{{route('recibir')}}">Recibir Transferencia</a></v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
            @endif
          @endauth
          @guest
            <v-list-tile @click="">
              <v-list-tile-action>
                <v-icon>person</v-icon>
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
                <v-icon>cancel</v-icon>
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
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
