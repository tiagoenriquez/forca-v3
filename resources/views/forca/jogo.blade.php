@extends('index')

@section('content')

<main>
    <h1>Jogo da Forca</h1>

    <form action="{{ route('submeter-letra') }}" method="post">
        @csrf    
        @include('forca.estado')        
        <div class="dica"><b>Dica: </b> {{ $forca->dica->texto }}</div>
        <div class="segredo">Palavra:
            @for ($i = 0; $i < strlen($forca->segredo); $i++)
            <div class="letra-de-segredo">{{ $forca->segredo[$i] }}</div>
            @endfor
        </div>
        <img src="{{ asset('img/erros-' . $forca->erros . '.jpg') }}" alt="Erros: {{ $forca->erros }}" class="forca" />
        @if(count($forca->letrasDigitadas) > 0)
        <div class="letras-digitadas"><b>Letras digitadas: </b>{{ implode(' - ', $forca->letrasDigitadas) }}</div>
        @endif
        <div class="campo-de-digitacao">
            <label for="letra">Digite uma letra</label>
            <input type="text" name="letra" id="letra" onkeyup="validarLetra()" autofocus required />
        </div>
        <button type="submit">Checar letra</button>
    </form>
</main>

@endsection

<script>
    function validarLetra() {
        let letra = document.getElementById('letra').value.toUpperCase();
        const letrasDigitadas = JSON.parse(document.getElementById('forca').value).letrasDigitadas;
        if (!'QWERTYUIOPASDFGHJKLZXCVBNM -'.includes(letra) || letrasDigitadas.includes(letra)) {
            letra = '';
        }
        if (letra.length > 1) {
            letra = letra.substring(0, 1);
        }
        document.getElementById('letra').value = letra;
    }
</script>