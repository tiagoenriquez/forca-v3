@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Erro: {{ $message }}</h1>
</main>

@endsection