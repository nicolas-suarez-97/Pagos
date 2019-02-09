@extends('layouts.app')

@section('content')
  <v-app id="inspire">
    <v-container fluid >
      <v-layout align-center justify-center>
        <v-flex xs12 md10>
          <v-card class="elevation-12">
            <v-toolbar dark color="primary">
              <v-toolbar-title>{{ __('Login') }}</v-toolbar-title>
            </v-toolbar>
            <v-card-text>
              <v-form action="{{ route('login') }}" method="POST" id="logout-form">
                @csrf
                <v-text-field prepend-icon="email" name="email" label="E-mail" type="email" value="{{ old('email') }}" required></v-text-field>
                @if ($errors->has('email'))
                    <span >
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <v-text-field id="password" prepend-icon="lock" name="password" label="Password" type="password"></v-text-field>
                @if ($errors->has('password'))
                    <span >
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="form-group row">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <v-spacer>
                </v-spacer>
                <v-btn color="primary" type="submit">Acceder</v-btn>
              </v-form>
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </v-app>
@endsection
