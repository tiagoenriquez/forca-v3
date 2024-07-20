@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Escolha um tema</h1>
    <form action="{{ route('iniciar-forca') }}" method="get">
        <select name="tema_id" id="tema_id">
            <option value="0"></option>
            @foreach($temas as $tema)
            <option value="{{ $tema->id }}" title="{{ $tema->numeroDePalavras($tema->id) }} palavras">{{ $tema->nome }}</option>
            @endforeach
        </select>
        <button type="submit">Jogar</button>
    </form>
</main>

@endsection