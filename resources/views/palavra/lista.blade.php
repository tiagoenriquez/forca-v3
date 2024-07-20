@extends('index')

@section('content')

@include('menu')

<main>
    @if (count($palavras) > 0)
    <h1>Palavras Encontradas</h1>
    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Tema</td><td></td><td></td><td></td><td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($palavras as $palavra)
            <tr>
                <td>{{ $palavra->nome }}</td>
                <td>{{ $palavra->tema->nome }}</td>
                <td>
                    <form action="{{ route('editar-palavra', $palavra->id) }}" method="get">
                        <button type="submit" class="iconed-button">
                            <img src="{{ asset('img/caneta.png') }}" alt="Editar" class="icon" title="Editar Palavra" />
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('ameacar-palavra', $palavra->id) }}" method="get">
                        <button type="submit" class="iconed-button">
                            <img src="{{ asset('img/lixeira.png') }}" alt="Excluir" class="icon" title="Excluir Palavra" />
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('cadastrar-dica', $palavra->id) }}" method="get">
                        <button type="submit" class="iconed-button" title="Cadastrar nova dica">+ Dica</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('dicas-da-palavra', $palavra->id) }}" method="get">
                        <button type="submit" class="iconed-button" title="Listar dicas da palavra">Dicas</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h1>Não há palavra com trecho digitado</h1>
    <form action="{{ route('digitar-trecho-de-palavra') }}" method="get">
        <button type="submit">Pesquisar outro trecho</button>
    </form>
    @endif
</main>

@endsection