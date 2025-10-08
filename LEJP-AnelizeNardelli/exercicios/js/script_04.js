document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('avaliacaoFormJS');
    const resultadoDiv = document.getElementById('resultadoJS');
    
    const PRESENCA_MINIMA = 75.0;

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        resultadoDiv.innerHTML = '';
        resultadoDiv.classList.remove('text-red-600', 'text-green-600', 'text-yellow-600', 'font-bold');
        
        // Capturamos os valores
        const nota = parseFloat(document.getElementById('notaJS').value.trim());
        const presenca = parseFloat(document.getElementById('presencaJS').value.trim());
        
        let erros = [];
        
        // Implementamos as validações de notas e presenças
        if (isNaN(nota) || nota < 0 || nota > 10) {
            erros.push("O valor da Nota deve ser entre 0 e 10.");
        }
        if (isNaN(presenca) || presenca < 0 || presenca > 100) {
            erros.push("O valor da Presença deve ser entre 0% e 100%.");
        }

        if (erros.length > 0) {
             resultadoDiv.innerHTML = '<div class="text-red-600 font-bold">' + erros.join('<br>') + '</div>';
             return;
        }

        // Definimos o estado de aprovação do aluno
        let mensagem = "";
        let classe_tailwind = "";

        if (presenca < PRESENCA_MINIMA) {
            mensagem = "REPROVADO POR FALTA.";
            classe_tailwind = "text-red-600 font-bold";
            
        } 
        else if (nota >= 6.0) {
            mensagem = "APROVADO!";
            classe_tailwind = "text-green-600 font-bold";
            
        } 
        else if (nota >= 4.0 && nota < 6.0) {
            mensagem = "SEGUNDA ÉPOCA (Recuperação).";
            classe_tailwind = "text-yellow-600 font-bold";
            
        } 
        else {
            mensagem = "REPROVADO POR NOTA.";
            classe_tailwind = "text-red-600 font-bold";
        }
        
        // Formatamos as saídas
        const formatarNumero = (n) => {
             return n.toLocaleString('pt-BR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
        }

        // E finalmente exibimos os resultados
        const nota_formatada = formatarNumero(nota);
        const presenca_formatada = formatarNumero(presenca);
        
        resultadoDiv.innerHTML = `
            <p>Nota: <strong>${nota_formatada}</strong> | Presença: <strong>${presenca_formatada}%</strong></p>
            <p class="${classe_tailwind}">Situação: ${mensagem}</p>
        `;
    });
});