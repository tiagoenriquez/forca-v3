@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Edição de Palavra</h1>
    <form action="{{ route('atualizar-palavra', $palavra->id) }}" method="post">
        @method('put')
        @csrf
        <div class="campo-de-digitacao">
            <label for="menu_id" class="label-for-input">Selecione um tema</label>
            <select name="menu_id" id="menu_id" autofocus>
                <option value="{{ $palavra->tema->id }}">{{ $palavra->tema->nome }}</option>
                @foreach ($temas as $tema)
                <option value="{{ $tema->id }}">{{ $tema->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="campo-de-digitacao">
            <label for="nome" class="label-for-input">Palavra</label>
            <input type="text" name="nome" id="nome" value="{{ $palavra->nome }}">
        </div>
        <button type="submit">Atualizar</button>
    </form>
</main>

@endsection