@extends('layouts.app')

@section('content')
  <h2>Enviar transferencia</h2>
  <h2 class="text-info">{{Auth::user()->name}}</h2>
  <div>
    <recibir-tansfer :info-user="user"/>
  </div>
@endsection
