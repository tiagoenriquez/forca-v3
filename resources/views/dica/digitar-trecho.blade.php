@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Procurar dica</h1>
    <label for="trecho">Digite um trecho</label>
    <textarea name="trecho" id="trecho" rows="2" cols="64" autofocus required></textarea>
    <button onclick="listar()">Pesquisar</button>
</main>

@endsection

<script>
    function listar() {
        window.location.href = `/dica/com-trecho/${document.getElementById('trecho').value}`;
    }
</script>