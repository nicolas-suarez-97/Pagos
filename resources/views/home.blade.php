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
      <v-btn color="primary" @click="col()" type="text">Pesos</v-btn>
      <v-btn color="primary" @click="btc()" type="text">Bitcoin</v-btn>
      <v-btn color="primary" @click="eth()" type="text">Ethereum</v-btn>
      <v-btn color="primary" @click="bch()" type="text">Bitcoin Cash</v-btn>
      <recibir-tansfer :info-user="user"/>
    </div>
    <input type="hidden" name="walletCOL" id="walletCOL" value="{{Auth::user()->walletCOL}}">
    <input type="hidden" name="walletBTC" id="walletBTC" value="{{Auth::user()->walletBTC}}">
    <input type="hidden" name="walletETH" id="walletETH" value="{{Auth::user()->walletETH}}">
    <input type="hidden" name="walletBCH" id="walletBCH" value="{{Auth::user()->walletBCH}}">
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
