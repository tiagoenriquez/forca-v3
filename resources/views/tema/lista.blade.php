@extends('index')

@section('content')

@include('menu')

<main>
    <h1>Temas</h1>
    <table>
        <thead>
            <tr>
                <td>Tema</td><td></td><td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($temas as $tema)
            <tr>
                <td>{{ $tema->nome }}</td>
                <td>
                    <form action="{{ route('editar-tema', $tema->id) }}" method="get">
                        <button type="submit" class="iconed-button">
                            <img src="{{ asset('img/caneta.png') }}" alt="Editar" class="icon" title="Editar" />
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('ameacar-tema', $tema->id) }}" method="get">
                        <button type="submit" class="iconed-button">
                            <img src="{{ asset('img/lixeira.png') }}" alt="Excluir" class="icon" title="Escluir" />
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>

@endsection