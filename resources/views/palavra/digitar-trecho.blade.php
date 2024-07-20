@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Editar Palavra</h1>
    <label for="trecho">Digite um trecho da palavra que você deseja editar.</label>
    <input type="text" name="trecho" id="trecho" autofocus required />
    <button onclick="pesquisar()">Pesquisar</button>
</main>

@endsection

<script>
    function pesquisar() {
        window.location.href = `/palavra/lista/${document.getElementById('trecho').value}`;
    }
</script>