@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Edição de Dica</h1>
    <form action="{{ route('atualizar-dica', $dica->id) }}" method="post">
        @method('put')
        @csrf
        <label for="texto">Corrija o texto</label>
        <label for="texto">Palavra: {{ $dica->palavra->nome }}</label>
        <textarea name="texto" id="texto" rows="8" cols="64" autofocus required>{{ $dica->texto }}</textarea>
        <button type="submit">Atualizar</button>
    </form>
</main>

@endsection