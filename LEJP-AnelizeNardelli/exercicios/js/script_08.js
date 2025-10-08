function calcularFatorialJS(n) {
  if (n < 0) {
    return -1;
  }
  if (n === 0 || n === 1) {
    return 1;
  }

  let fatorial = 1;

  for (let i = n; i >= 2; i--) {
    fatorial *= i;
  }

  return fatorial;
}

document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('fatorialFormJS');
  const resultadoDiv = document.getElementById('resultadoJS');

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    resultadoDiv.innerHTML = '';

    // Capturamos e convertemos o valor para inteiro
    const numN = parseInt(document.getElementById('numNJS').value.trim(), 10);

    let erros = [];

    // Implementamos as Validações Necessárias
    if (isNaN(numN) || numN < 0) {
      erros.push('O valor de N deve ser um número inteiro não negativo (N >= 0).');
    }

    if (erros.length > 0) {
      resultadoDiv.innerHTML = '<div class="text-red-600 font-bold">' + erros.join('<br>') + '</div>';
      return;
    }

    // Chamamos a função para o cálculo
    const fatorialResultado = calcularFatorialJS(numN);

    // Formatamos o resultado para melhor exibição (sem casas decimais)
    const fatorialFormatado = fatorialResultado.toLocaleString('pt-BR', { maximumFractionDigits: 0 });

    // Montamos e Injetamos os Resultados no DOM
    resultadoDiv.innerHTML = `
            <p>O Fatorial de N = <strong>${numN}</strong> é:</p>
            <p>Resultado: <strong>${fatorialFormatado}</strong></p>
        `;
  });
});
