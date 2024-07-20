<table>
    <thead>
        <tr>
            <th colspan="2">Estatística</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Vitórias</td>
            <td>{{ $estatistica['vitorias'] }}</td>
        </tr>
        <tr>
            <td>Derrotas</td>
            <td>{{ $estatistica['derrotas'] }}</td>
        </tr>
        <tr>
            <td>Percentagem de vitórias</td>
            <td>{{ $estatistica['percentagemDeVitorias'] }}</td>
        </tr>
        <tr>
            <td>Acertos</td>
            <td>{{ $estatistica['acertos'] }}</td>
        </tr>
        <tr>
            <td>Erros</td>
            <td>{{ $estatistica['erros'] }}</td>
        </tr>
        <tr>
            <td>Percentagem de acertos</td>
            <td>{{ $estatistica['percentagemDeAcertos'] }}</td>
        </tr>
    </tbody>
</table>