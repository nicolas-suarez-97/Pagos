@extends('layouts.app')

@section('content')
  <h2 class="text-info">Perfil de {{Auth::user()->name}}</h2>
  <h2 class="h3">Correo:  <span class="text-info">{{Auth::user()->email}}</span></h2>
  {{-- @foreach ($user->transations as $transation)
    <h2 class="h3 text-info">{{$transation->mount}}</h2>
  @endforeach --}}
  <h2 class="h3">Saldo: <span class="text-info">${{Auth::user()->ColPesos[0]->mount}}</span></h2>
  <h2 class="h3" v-if="user.addressCOL">Wallet Pesos: <span class="text-info" v-text="user.addressCOL"></span></h2>
  <h2 class="h3" v-if="user.walletBTC">Wallet BTC: <span class="text-info" v-text="user.walletBTC"></span></h2>
  <h2 class="h3" v-if="user.walletETH">Wallet ETH: <span class="text-info" v-text="user.walletETH"></span></h2>
  <h2 class="h3" v-if="user.walletBCH">Wallet BCH: <span class="text-info" v-text="user.walletBCH"></span></h2>
  </div>
@endsection
