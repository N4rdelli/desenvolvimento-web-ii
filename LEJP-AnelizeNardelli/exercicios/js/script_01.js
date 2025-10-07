document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('cadastroFormJS');
    const resultadoP = document.getElementById('resultadoJS');

    form.addEventListener('submit', function(event) {
        // Primeiro nós previnimos o envio imediato
        event.preventDefault();

        // Depois nós selecionamos as tags com as quais vamos trabalhar
        resultadoP.textContent = '';
        resultadoP.classList.remove('erro');

        const nome = document.getElementById('nomeJS').value.trim();
        const email = document.getElementById('emailJS').value.trim();
        const telefone = document.getElementById('telefoneJS').value.trim();
        const idade = parseInt(document.getElementById('idadeJS').value.trim(), 10);
        
        // Em seguida fazemos todas as validações necessárias
        let erros = [];

        if (nome.length < 3) {
            erros.push("O Nome Completo deve ter mais de 3 letras.");
        }
        
        if (isNaN(idade) || idade < 0) {
            erros.push("A Idade deve ser um número não negativo.");
        }

        if (erros.length > 0) {
            resultadoP.innerHTML = 'Houve(ram) erro(s) de validação:<br>' + erros.join('<br>');
            resultadoP.classList.add('erro');
            return;
        }

        // Por fim, formatamos os dados necessários
        let telefoneFormatado = telefone.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        if (telefoneFormatado === telefone) {
             telefoneFormatado = telefone.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3');
        }
        
        // E finalmente fazemos a injeção no HTML
        const mensagem = `${nome} tem ${idade} anos. Seu email: ${email} e telefone:${telefoneFormatado}`;
        resultadoP.textContent = mensagem;
        resultadoP.classList.remove('erro');
    });
});