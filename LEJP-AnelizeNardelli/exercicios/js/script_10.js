document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contagemParesFormJS');
    const resultadoDiv = document.getElementById('resultadoJS');
    
    // Nós definimos a constante para o número de parada
    const NUMERO_PARADA = 0;

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Impedimos o envio padrão

        resultadoDiv.innerHTML = '';
        
        // Capturamos a string de input
        const inputStr = document.getElementById('numerosJS').value.trim();
        
        // Limpamos a string
        const valoresStr = inputStr.replace(/[^\d\s\-,]+/g, '').split(/[\s,]+/).filter(v => v.length > 0);
        
        let contadorPares = 0;
        let erros = [];
        let numerosLidos = [];
        let paradaEncontrada = false;

        // Usamos um loop for...of para simular a leitura sequencial
        for (const valorStr of valoresStr) {
            // Nós convertemos para inteiro
            const num = parseInt(valorStr, 10);
            
            // Implementamos as Validações Necessárias
            if (isNaN(num)) {
                erros.push(`O valor '${valorStr}' é inválido. Esperamos apenas números inteiros.`);
                break;
            }

            if (num === NUMERO_PARADA) {
                paradaEncontrada = true;
                break;
            }

            if (num % 2 === 0) {
                contadorPares++;
            }
            
            // Adicionamos à lista de números processados (antes do 0)
            numerosLidos.push(num);
        }

        if (erros.length > 0) {
             resultadoDiv.innerHTML = '<div class="text-red-600 font-bold">' + erros.join('<br>') + '</div>';
             return;
        }

        // Montamos e Injetamos os Resultados no DOM
        if (!paradaEncontrada) {
            resultadoDiv.innerHTML = `<div class='text-red-600 font-bold'>Atenção: O número de parada (0) não foi digitado. Contamos todos os números válidos inseridos.</div>
                                    <p>Números lidos: <strong>${numerosLidos.join(', ')}</strong></p>
                                    <p>Total de Pares encontrados: <strong>${contadorPares}</strong></p>`;
        } else {
            resultadoDiv.innerHTML = `
                <p>Números lidos (até o 0): <strong>${numerosLidos.join(', ')}</strong></p>
                <p>Total de Pares encontrados: <strong>${contadorPares}</strong></p>
            `;
        }
    });
});