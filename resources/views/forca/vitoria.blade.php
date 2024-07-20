@extends('index')

@section('content')

<main class="vitoria">
    <h1>Parabens! Você venceu!</h1>    
    @include('forca.estatistica')
    <div class="buttons">
        <form action="{{ route('outra-forca') }}" method="post">
            @csrf
            @include('forca.estado')
            <button type="submit">Vencer mais uma</button>
        </form>
        <form action="{{ route('escolher-tema-de-forca') }}" method="get">
            <button type="submit">Parar por aqui</button>
        </form>
    </div>
</main>

@endsection