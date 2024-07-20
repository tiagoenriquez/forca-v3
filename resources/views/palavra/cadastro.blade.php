@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Cadastro de Palavra</h1>
    <form action="{{ route('inserir-palavra') }}" method="post">
        @csrf
        <div class="campo-de-digitacao">
            <label for="tema_id" class="label-for-input">Selecione um tema</label>
            <select name="tema_id" id="tema_id" autofocus>
                <option value="0"></option>
                @foreach ($temas as $tema)
                <option value="{{ $tema->id }}">{{ $tema->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="campo-de-digitacao">
            <label for="nome" class="label-for-input">Palavra</label>
            <input type="text" name="nome" id="nome" required />
        </div>
        <button type="submit">Salvar</button>
    </form>
</main>

@endsection