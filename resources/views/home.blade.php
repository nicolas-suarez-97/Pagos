@extends('layouts.app')

@section('content')

<canvas id="canvasQR" width="200" height="200" class="img-responsive center-block img-thumbnail" class="text-center"></canvas>

@section('scripts')
  <script type="text/javascript" src="{{asset('js/recibir.js')}}"></script>
  <script type="text/javascript">
  //Generador QR
  $('#canvasQR').qrcode({'text':'1MoFKJj8DuPuf4HRKzP6UXEtTQA162LgHh'});
  </script>

@endsection
