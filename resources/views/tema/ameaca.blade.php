@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Tem certeza de que deseja excluir o tema {{ $tema->nome }}?</h1>
    <div class="buttons">
        <form action="{{ route('temas') }}" method="get">
            <button type="submit">Não</button>
        </form>
        <form action="{{ route('excluir-tema', $tema->id) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Sim</button>
        </form>
    </div>
</main>

@endsection