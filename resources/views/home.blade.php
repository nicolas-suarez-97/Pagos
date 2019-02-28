@extends('layouts.app')

@section('content')
  @if(Auth::user()->hasRole('admin'))
    @include('home.admin')
  @elseif (Auth::user()->hasRole('aliado'))
    <h2>Transferir a:</h2>
    <h2 class="text-info">{{Auth::user()->name}}</h2>
    <div>
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
