document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('calculadoraFormJS');
    const resultadoDiv = document.getElementById('resultadoJS');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o envio padrão

        resultadoDiv.innerHTML = '';
        
        // Usamos parseFloat para garantir que números decimais sejam tratados corretamente
        const num1 = parseFloat(document.getElementById('num1JS').value.trim());
        const num2 = parseFloat(document.getElementById('num2JS').value.trim());
        
        let erros = [];
        
        // Fazemos as alidações Básicas
        if (isNaN(num1)) {
            erros.push("O Primeiro Número não é válido.");
        }
        if (isNaN(num2)) {
            erros.push("O Segundo Número não é válido.");
        }

        if (erros.length > 0) {
             resultadoDiv.innerHTML = '<div class="text-red-600 font-bold">' + erros.join('<br>') + '</div>';
             return;
        }

        // Realizamos os cálculos
        const soma = num1 + num2;
        const subtracao = num1 - num2;
        const multiplicacao = num1 * num2;
        
        let divisao;
        if (num2 === 0) {
            divisao = "Não é possível dividir por zero (0)";
        } else {
            divisao = num1 / num2;
            // Formatamos as saídas
            divisao = divisao.toFixed(2);
        }
        
        const formatarNumero = (n) => {
             return typeof n === 'number' ? n.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) : n;
        }

        // E finalmente injetamos os resultados no HTML
        resultadoDiv.innerHTML = `
            <p>Soma: <strong>${formatarNumero(soma)}</strong></p>
            <p>Subtração: <strong>${formatarNumero(subtracao)}</strong></p>
            <p>Multiplicação: <strong>${formatarNumero(multiplicacao)}</strong></p>
            <p>Divisão: <strong>${formatarNumero(divisao)}</strong></p>
        `;
    });
});