@extends('index')

@section('content')

@include('menu')

<main>
    @if (count($dicas) > 0)
    <h1>Dicas com o trecho digitado</h1>
    <table>
        <thead>
            <tr>
                <td>Dica</td>
                <td>Palavra</td><td></td><td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dicas as $dica)
            <tr>
                <td>{{ $dica->texto }}</td>
                <td>{{ $dica->palavra->nome }}</td>
                <td>
                    <form action="{{ route('editar-dica', $dica->id) }}" method="get">
                        <button type="submit" class="iconed-button">
                            <img src="{{ asset('img/caneta.png') }}" alt="Editar" title="Editar" class="icon">
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('ameacar-dica', $dica->id) }}" method="get">
                        <button type="submit" class="iconed-button">
                            <img src="{{ asset('img/lixeira.png') }}" alt="Excluir" title="Excluir" class="icon">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h1>Não há dica com trecho digitado.</h1>
    <form action="{{ route('digitar-trecho-de-dica') }}" method="get">
        <button type="submit">Digitar outro trecho</button>
    </form>
    @endif
</main>

@endsection