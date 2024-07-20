@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Tem certeza de que deseja excluir a dica da palavra "{{ $dica->palavra->nome }}" abaixo?</h1>
    <p>{{ $dica->texto }}</p>
    <div class="buttons">
        <form action="{{ route('dicas-da-palavra', $dica->palavra->id) }}" method="get">
            <button type="submit">Não</button>
        </form>
        <form action="{{ route('excluir-dica', $dica->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Sim</button>
        </form>
    </div>
</main>

@endsection