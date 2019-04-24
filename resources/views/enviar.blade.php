@extends('layouts.app')

@section('content')
  <h2>Enviar Transferencia:</h2>
  <h2 class="text-info">{{Auth::user()->name}}</h2>
  {{-- @foreach ($user->transations as $transation)
    <h2 class="h3 text-info">{{$transation->mount}}</h2>
  @endforeach --}}
  <h2 class="h3 text-info" id="userMount">${{Auth::user()->ColPesos[0]->mount}}</h2>
  <div>
    <enviar-tansfer :info-user="user"/>
  </div>
  <input type="hidden" name="walletCOL" id="walletCOL" value="{{Auth::user()->walletCOL}}">
  <input type="hidden" name="walletBTC" id="walletBTC" value="{{Auth::user()->walletBTC}}">
  <input type="hidden" name="walletETH" id="walletETH" value="{{Auth::user()->walletETH}}">
  <input type="hidden" name="walletBCH" id="walletBCH" value="{{Auth::user()->walletBCH}}">
  <input type="hidden" name="userID" id="userID" value="{{Auth::user()->id}}">
  </div>
@endsection
