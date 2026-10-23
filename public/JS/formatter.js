/*
-------------------------------------------------
        /[^\d]/g - EXPRESSÃO REGULAR REGEX
-------------------------------------------------
\d = número
^ = negação
g = substitui no texto todo

*/
let input = document.getElementById('valor');
input.addEventListener('input', function() {

    // Remove letras e símbolos, mantendo apenas números (0-9)
    let inputValue = this.value.replace(/[^\d]/g, ''); 

    // Adiciona separador de milhares
    var formatterValue = (inputValue.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '' + inputValue.slice(-2);

    // Adiciona a vírgula se houver centavos
    formatterValue = formatterValue.slice(0, -2) + ',' + formatterValue.slice(-2);

    // Atualiza o html com valor formatado
    this.value = formatterValue;
});