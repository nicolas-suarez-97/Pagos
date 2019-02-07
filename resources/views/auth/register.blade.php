@extends('layouts.app')

@section('content')
<v-app id="inspire">
  <v-container fluid >
    <v-layout align-center justify-center>
      <v-flex xs12 md10>
        <v-card class="elevation-12">
          <v-toolbar dark color="primary">
            <v-toolbar-title>Registro</v-toolbar-title>
          </v-toolbar>
          <v-card-text>
            <v-form action="{{ route('register') }}" method="POST" id="register-form">
              @csrf
              <v-text-field prepend-icon="person" name="name" label="Nombre" type="text" value="{{ old('name') }}"></v-text-field>
              @if ($errors->has('name'))
                  <span >
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
              <v-text-field prepend-icon="email" name="email" label="E-mail" type="email" value="{{ old('email') }}"></v-text-field>
              @if ($errors->has('email'))
                  <span >
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
              <v-text-field id="password" prepend-icon="lock" name="password" label="Contraseña" type="password"></v-text-field>
              <v-text-field id="password-confirm" prepend-icon="lock" name="password_confirmation" label="Repite la contraseña" type="password"></v-text-field>
              @if ($errors->has('password'))
                  <span >
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
              <div class="form-group row">
                  <div class="col-md-6 offset-md-4">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                          <label class="form-check-label" for="remember">
                              {{ __('Remember Me') }}
                          </label>
                      </div>
                  </div>
              </div>
            </v-form>
          </v-card-text>
          <v-card-actions>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <v-spacer></v-spacer>
            <v-btn color="primary" onclick="event.preventDefault();
                          document.getElementById('register-form').submit();">Registrarse</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</v-app>
@endsection
