<style>

:root {
--marrom: rgb(128, 96, 64);
--marrom-claro: rgb(192, 176, 160);
--marrom-escuro: rgb(64, 48, 32);
--marrom-muito-claro: rgb(224, 216, 208);
--marrom-muito-escuro: rgb(32, 24, 16);
--marrom-pouco-claro: rgb(160, 136, 112);
--marrom-pouco-escuro: rgb(96, 72, 48);
--familia-da-fonte: serif;
--margem-grande: 8px 8px 8px 8px;
--margem-texto: 4px 8px 4px 8px;
--tamanho-da-fonte: 16px;
}

a {
    background-color: var(--marrom-muito-escuro);
    border: none;
    color: white;
    cursor: pointer;;
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    margin: var(--margem-grande);
    padding: var(--margem-texto);
    text-decoration: none
}

a:hover {
    background-color: var(--marrom-escuro);
}

a:active {
    background-color: var(--marrom-pouco-escuro);
}

body {
    background-color: var(--marrom);
    color: white;
    margin: 0px;
}

button {
    background-color: var(--marrom-muito-escuro);
    border: none;
    color: white;
    cursor: pointer;
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    margin: var(--margem-grande);
    padding: var(--margem-texto);
}

button:hover {
    background-color: var(--marrom-escuro);
    color: white;
}

button:active {
    background-color: var(--marrom-pouco-escuro);
    color: white;
}

h1 {
    font-family: var(--familia-da-fonte);
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

label {
    display: flex;
    flex-direction: column;
    text-align: center;
    justify-content: center;
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    margin: var(--margem-grande);
}

.label-for-input {
    text-align: right;
    width: 192px;
}

input {
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    height: 32px;
    margin: var(--margem-grande);
    padding: var(--margem-texto);
    width: 256px;
}

main {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    min-width: 100vw;
}

nav {
    background-color: var(--marrom-muito-escuro);
    display: flex;
    flex-direction: row;
    align-items: center;
}

p {
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    margin: var(--margem-grande);
    padding: var(--margem-texto);
    text-align: justify;
    width: 1024px;
}

select {
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    height: 32px;
    margin: var(--margem-grande);
    padding: var(--margem-texto);
    width: 256px;
}

table {
    margin: var(--margem-grande);
}

tbody tr:hover {
    background-color: var(--marrom-pouco-claro);
}

td {
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    padding: var(--margem-texto);
    text-align: center;
}

th {
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    font-weight: bold;
    padding: var(--margem-texto);
    text-align: center;
    text-transform: uppercase;
}

thead {
    background-color: var(--marrom-escuro);
}

textarea {
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    margin: var(--margem-grande);
    padding: var(--margem-texto);
}

.buttons {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin: var(--margem-grande);
}

.campo-de-digitacao {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin: var(--margem-grande);
}

.derrota {
    background-color: rgb(191, 64, 64);
}

.dica {
    border: 1px solid white;
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    margin: var(--margem-grande);
    padding: 16px 16px 16px 16px;
    text-align: justify;
}

.icon {
    height: 32px;
    width: auto;
}

.iconed-button {
    height: 48px;
}

.forca {
    height: 256px;
    width: auto;
    margin: var(--margem-grande);
}

.letra-de-segredo {
    background-color: var(--marrom-pouco-escuro);
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    margin: var(--margem-grande);
    padding: var(--margem-texto);
    text-align: center;
}

.letras-digitadas {
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    margin: var(--margem-grande);
    padding: var(--margem-texto);
    text-align: center;
}

.palavra-certa {
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    margin: var(--margem-grande);
    padding: var(--margem-texto);
    text-align: center;
}

.segredo {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    font-family: var(--familia-da-fonte);
    font-size: var(--tamanho-da-fonte);
    margin: var(--margem-grande);
}

.vitoria {
    background-color: rgb(64, 128, 64);
}

</style>