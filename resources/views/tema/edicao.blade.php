@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Edição de Tema</h1>
    <form action="{{ route('atualizar-tema', $tema->id) }}" method="post">
        @method('put')
        @csrf
        <div class="campo-de-digitacao">
            <label for="nome" class="label-for-input">Tema</label>
            <input type="text" name="nome" id="nome" value="{{ $tema->nome }}" autofocus required />
        </div>
        <button type="submit">Atualizar</button>
    </form>
</main>

@endsection