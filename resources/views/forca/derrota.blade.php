@extends('index')

@section('content')

<main class="derrota">
    <h1>Que pena! Você perdeu!</h1>
    <p class="palavra-certa"><b>Palavra certa: </b>{{ $forca->dica->palavra->nome }}</p>
    @include('forca.estatistica')
    <div class="buttons">
        <form action="{{ route('outra-forca') }}" method="post">
            @csrf
            @include('forca.estado')
            <button type="submit">Dessa vez você vence</button>
        </form>
        <form action="{{ route('escolher-tema-de-forca') }}" method="get">
            <button type="submit">Desistir</button>
        </form>
    </div>
</main>

@endsection