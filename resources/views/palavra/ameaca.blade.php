@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Tem certeza de que deseja excluir a palavra {{ $palavra->nome }} referente ao tema {{ $palavra->tema->nome }}?</h1>
    <div class="buttons">
        <form action="{{ route('palavras', $palavra->nome) }}" method="get">
            <button type="submit">Não</button>
        </form>
        <form action="{{ route('excluir-palavra', $palavra->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Sim</button>
        </form>
    </div>
</main>

@endsection