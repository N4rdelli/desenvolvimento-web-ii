document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('somaNFormJS');
    const resultadoDiv = document.getElementById('resultadoJS');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        resultadoDiv.innerHTML = '';
        
        // Já capturamos o valor convertendo ele para um inteiro
        const numN = parseInt(document.getElementById('numNJS').value.trim(), 10);
        
        let erros = [];
        
        // Validamos se ele é um número positivo
        if (isNaN(numN) || numN < 1) {
            erros.push("O valor de N deve ser um número inteiro e positivo (N >= 1).");
        }

        if (erros.length > 0) {
             resultadoDiv.innerHTML = '<div class="text-red-600 font-bold">' + erros.join('<br>') + '</div>';
             return;
        }

        // Fazemos o cálculo da soma
        let soma = 0;
        for (let i = 1; i <= numN; i++) {
            soma += i;
        }
        
        // E finalmente exibimos esse resultado
        resultadoDiv.innerHTML = `
            <p>Para N = <strong>${numN}</strong>:</p>
            <p>Soma (1 até N): <strong>${soma.toLocaleString('pt-BR')}</strong></p>
        `;
    });
});