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
    <div>
      <recibir-tansfer :info-user="user"/>
    </div>



  @elseif (Auth::user()->hasRole('user'))

    <v-card>
      <v-card-title>Transferir a: </v-card-title>
      <v-card-text>
        <p>enviar</p>
      </v-card-text>
      <v-card-actions>
        <p>enviar</p>
      </v-card-actions>
    </v-card>

  @endif

@endsection

@section('scripts')
  @if(Auth::user()->hasRole('admin'))




  @elseif (Auth::user()->hasRole('aliado'))




  @elseif (Auth::user()->hasRole('user'))



  @endif

@endsection
