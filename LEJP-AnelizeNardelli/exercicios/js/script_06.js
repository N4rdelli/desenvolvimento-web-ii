document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('mediaFormJS');
    const resultadoDiv = document.getElementById('resultadoJS');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        resultadoDiv.innerHTML = '';
        
        // Capturamos todos os inputs que fazem parte do vetor de números
        const inputElements = document.querySelectorAll('#mediaFormJS .numero-js');
        const numeros = [];
        let erros = [];
        let soma = 0;
        
        // Iteramos sobre os inputs para validar, converter e armazenar no nosso vetor
        inputElements.forEach((input, index) => {
            const valor = parseFloat(input.value.trim());
            
            // Implementamos as Validações Necessárias
            if (isNaN(valor)) {
                erros.push(`O valor para o Número ${index + 1} não é válido.`);
            } else {
                numeros.push(valor);
                soma += valor;
            }
        });

        if (erros.length > 0) {
             resultadoDiv.innerHTML = '<div class="text-red-600 font-bold">' + erros.join('<br>') + '</div>';
             return;
        }

        // Calculamos a Média
        const media = soma / numeros.length;
        
        // Formatamos o resultado
        const formatarNumero = (n) => {
             return n.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        // Montamos e Injetamos os Resultados no DOM
        const media_formatada = formatarNumero(media);
        
        resultadoDiv.innerHTML = `
            <p>Números lidos: <strong>${numeros.join(', ')}</strong></p>
            <p>A Média dos 5 números é: <strong>${media_formatada}</strong></p>
        `;
    });
});