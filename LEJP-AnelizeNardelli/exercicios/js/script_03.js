document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('retanguloFormJS');
    const resultadoDiv = document.getElementById('resultadoJS');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        resultadoDiv.innerHTML = '';
        
        // Capturamos os valores que serão utilizados
        const base = parseFloat(document.getElementById('baseJS').value.trim());
        const altura = parseFloat(document.getElementById('alturaJS').value.trim());
        
        let erros = [];
        
        // Fazemos as validações necessárias com esses valores
        if (isNaN(base) || base < 0) {
            erros.push("O valor da Base é inválido ou negativo.");
        }
        if (isNaN(altura) || altura < 0) {
            erros.push("O valor da Altura é inválido ou negativo.");
        }

        if (erros.length > 0) {
             resultadoDiv.innerHTML = '<div class="text-red-600 font-bold">' + erros.join('<br>') + '</div>';
             return;
        }

        // Efetuamos os cálculos
        const area = base * altura;
        
        const perimetro = 2 * (base + altura);
        
        const formatarNumero = (n) => {
             return n.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        // E finalizamos com a injeção dos resultados no HTML
        resultadoDiv.innerHTML = `
            <p>Área do Retângulo: <strong>${formatarNumero(area)}</strong></p>
            <p>Perímetro do Retângulo: <strong>${formatarNumero(perimetro)}</strong></p>
        `;
    });
});