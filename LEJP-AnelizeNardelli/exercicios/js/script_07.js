document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('matrizNotasFormJS');
    const resultadoDiv = document.getElementById('resultadoJS');
    
    // Definimos as constantes para manter a lógica clara
    const NUM_ALUNOS = 3;
    const NUM_NOTAS = 2;

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        resultadoDiv.innerHTML = '';
        
        // 1. Capturamos todos os inputs de nota
        const inputElements = document.querySelectorAll('#matrizNotasFormJS .nota-js');
        
        // Criamos a nossa matriz
        const matrizNotas = {};
        for (let i = 1; i <= NUM_ALUNOS; i++) {
            matrizNotas[i] = [];
        }

        let erros = [];
        
        inputElements.forEach((input) => {
            // Capturamos os IDs de Aluno e Nota diretamente dos atributos data
            const alunoId = parseInt(input.dataset.aluno, 10);
            const nota = parseFloat(input.value.trim());
            
            // Implementamos as Validações Necessárias
            if (isNaN(nota) || nota < 0 || nota > 10) {
                erros.push(`A nota do Aluno ${alunoId} é inválida ou fora do intervalo (0-10).`);
            } else {
                matrizNotas[alunoId].push(nota);
            }
        });

        if (erros.length > 0) {
             // Filtramos os erros duplicados e os exibimos
             resultadoDiv.innerHTML = '<div class="text-red-600 font-bold">' + [...new Set(erros)].join('<br>') + '</div>'; 
             return;
        }

        // Calculamos a Média de cada aluno
        let resultadoHTML = '<p class="font-bold mb-2">Médias dos Alunos:</p>';
        
        for (let alunoId = 1; alunoId <= NUM_ALUNOS; alunoId++) {
            const notas = matrizNotas[alunoId];
            
            const soma = notas.reduce((acc, curr) => acc + curr, 0);
            const media = soma / NUM_NOTAS;
            
            // Formatamos a média para exibição
            const mediaFormatada = media.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            
            resultadoHTML += `<p>Aluno ${alunoId}: <strong>${mediaFormatada}</strong></p>`;
        }

        // Injetamos os Resultados no DOM
        resultadoDiv.innerHTML = resultadoHTML;
    });
});