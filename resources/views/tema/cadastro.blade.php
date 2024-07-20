@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Cadastro de tema</h1>
    <form action="{{ route('inserir-tema') }}" method="post">
        @csrf
        <div class="campo-de-digitacao">
            <label for="nome" class="label-for-input">Tema</label>
            <input type="text" name="nome" id="nome" autofocus required />
        </div>
        <button type="submit">Salvar</button>
    </form>
</main>

@endsection