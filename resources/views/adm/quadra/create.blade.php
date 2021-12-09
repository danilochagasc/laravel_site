@extends('Initial.inicio')

@section('conteudo')
@if(count($errors) > 0)
<ul class="validator">
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
<form method="POST" action="{{url('quadra')}}">
  @csrf
  @method('POST')
  <div class="row">
    <label class="col-2" for="nom">Nome</label>
    <input type="text" name="nome" id="nom" class="col-3" value="{{ old('nome') }}" />
  </div>
  <div class="row">
    <label class="col-2" for="modali">Modalidade</label>
    <input type="text" name="modalidade" id="modali" class="col-5" value="{{ old('modalidade') }}" />
    <label class="col-2" for="lat">Latitude</label>
    <input type="text" name="latitude" id="lat" class="col-3" value="{{ old('latitude') }}" />
  </div>
  <div class="row">
    <label class="col-2" for="long">Longitude</label>
    <input type="text" name="longitude" id="long" class="col-5" value="{{ old('longitude') }}" />
  <button type="submit" class="button">Salvar</button>
</form>

@endsection