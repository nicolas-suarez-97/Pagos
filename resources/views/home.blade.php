@extends('layouts.app')

@section('content')
  @if(Auth::user()->hasRole('admin'))

    <v-card>
      <v-card-title>Transferir a: </v-card-title>
      <v-card-text>
        <p>Hola admin</p>
      </v-card-text>
    </v-card>


  @elseif (Auth::user()->hasRole('aliado'))
    <h2>{{Auth::user()->name}}</h2>
    <div>
      <recibir-tansfer :info-user="user"/>
    </div>



  @elseif (Auth::user()->hasRole('user'))

    <v-card>
      <v-card-title>Transferir a: </v-card-title>
      <v-card-text
      justify-center
      align-center
      >
      <v-tooltip left>
      <v-btn slot="activator" href="#" icon large>
        <v-icon large >camera</v-icon>
      </v-btn>
      <span>Lee un código Qr</span>
    </v-tooltip>
        <v-text-field prepend-icon="person" name="wallet" label="Wallet" type="text"></v-text-field>
        <v-tooltip left>
        <v-btn slot="activator" href="#" icon large>
          <v-icon large class="text-info">send</v-icon>
        </v-btn>
        <span>Transferir</span>
      </v-tooltip>
      </v-card-text>
    </v-card>

  @endif

@endsection

@section('scripts')
  @if(Auth::user()->hasRole('admin'))




  @elseif (Auth::user()->hasRole('aliado'))




  @elseif (Auth::user()->hasRole('user'))



  @endif

@endsection
