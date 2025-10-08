document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('arredondamentoFormJS');
    const resultadoDiv = document.getElementById('resultadoJS');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        resultadoDiv.innerHTML = '';
        
        // Capturamos e convertemos o valor para float
        const numDecimalInput = document.getElementById('numDecimalJS').value.trim();
        const numDecimal = parseFloat(numDecimalInput);
        
        let erros = [];
        
        // Implementamos as Validações Necessárias
        if (isNaN(numDecimal)) {
            erros.push("O valor inserido não é um número válido.");
        }

        if (erros.length > 0) {
             resultadoDiv.innerHTML = '<div class="text-red-600 font-bold">' + erros.join('<br>') + '</div>';
             return;
        }

        // Calculamos o arredondamento para cima e para baixo
        const arredondadoCeil = Math.ceil(numDecimal);
        const arredondadoFloor = Math.floor(numDecimal);
        
        // Formatamos o número original para exibição
        const numFormatado = numDecimal.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        
        // Montamos e Injetamos os Resultados no DOM do HTML
        resultadoDiv.innerHTML = `
            <p>Número Original: <strong>${numFormatado}</strong></p>
            <hr class="my-2 border-gray-300">
            <p>Arredondamento para CIMA (ceil): <strong>${arredondadoCeil}</strong></p>
            <p>Arredondamento para BAIXO (floor): <strong>${arredondadoFloor}</strong></p>
        `;
    });
});