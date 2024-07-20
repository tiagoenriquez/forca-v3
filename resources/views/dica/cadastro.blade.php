@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Cadastro de Dica</h1>
    <form action="{{ route('inserir-dica') }}" method="post">
        @csrf
        <label for="texto">Escreva uma dica para a palavra "{{ $palavra->nome }}".</label>
        <label for="texto">Tema: {{ $palavra->tema->nome }}</label>
        <textarea name="texto" id="texto" rows="8" cols="64" autofocus required></textarea>
        <input type="hidden" name="palavra_id" value="{{ $palavra->id }}">
        <button type="submit">Salvar</button>
    </form>
</main>

@endsection