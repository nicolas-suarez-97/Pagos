@extends('layouts.app')

@section('content')
  @if(Auth::user()->hasRole('admin'))
    <v-card>
      <v-card-text>
        <p class="display-2 .font-weight-thin.font-italic text-info">Paga Fácil</p>
      </v-card-text>
    </v-card>


  @elseif (Auth::user()->hasRole('aliado'))
    <h2>Transferir a:</h2>
    <h2 class="text-info">{{Auth::user()->name}}</h2>
    <div>
      <recibir-tansfer :info-user="user"/>
    </div>



  @elseif (Auth::user()->hasRole('user'))
    <div>
      <enviar-tansfer :info-user="user"/>
    </div>
  @endif

@endsection

@section('scripts')
  @if(Auth::user()->hasRole('admin'))




  @elseif (Auth::user()->hasRole('aliado'))




  @elseif (Auth::user()->hasRole('user'))



  @endif

@endsection
