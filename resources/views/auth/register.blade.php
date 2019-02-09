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
              @if ($errors->has('password'))
                  <span >
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
              <v-text-field id="password-confirm" prepend-icon="lock" name="password_confirmation" label="Repite la contraseña" type="password"></v-text-field>
              @if ($errors->has('password-confirm'))
                  <span >
                      <strong>{{ $errors->first('password-confirm') }}</strong>
                  </span>
              @endif
              <v-text-field prepend-icon="account_balance_wallet" name="btc" label="Address de Bitcoin (opcional)" type="text" value=""></v-text-field>
              @if ($errors->has('walletBTC'))
                  <span >
                      <strong>{{ $errors->first('walletBTC') }}</strong>
                  </span>
              @endif
              <v-text-field prepend-icon="account_balance_wallet" name="eth" label="Address de Ethereum (opcional)" type="text" value=""></v-text-field>
              @if ($errors->has('walletETH'))
                  <span >
                      <strong>{{ $errors->first('walletETH') }}</strong>
                  </span>
              @endif
              <v-text-field prepend-icon="account_balance_wallet" name="bch" label="Address de Bitcoin Cash (opcional)" type="text" value=""></v-text-field>
              @if ($errors->has('walletBCH'))
                  <span >
                      <strong>{{ $errors->first('walletBCH') }}</strong>
                  </span>
              @endif
              <v-btn color="primary" type="submit">Registrarse</v-btn>
            </v-form>
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</v-app>
@endsection
