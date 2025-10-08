<?php
require_once "config.php";
require_once "./views/navbar_template.php"
?>
<div class="px-8 md:px-32 py-8 flex flex-col">

    <div class="flex flex-col space-y-4 mb-8">
        <h1 class="text-5xl text-gray-900">Menu Inicial</h1>
        <p class="text-gray-700 text-base font-light">Projeto prático de lógica de programação. Veja 10 exercícios resolvidos em PHP (Server-side) e JavaScript (Client-side).</p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
        <?php
        $card_href = BASE_URL . 'exercicios/php/exercicio_01.php';
        $card_title = 'Exercício 1';
        $card_content = 'Lê informações de um usuário e as exibe na tela.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/php/exercicio_02.php';
        $card_title = 'Exercício 2';
        $card_content = 'Lê 2 números e exibe soma, subtração, multiplicação e divisão.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/php/exercicio_03.php';
        $card_title = 'Exercício 3';
        $card_content = 'Lê a base e a altura de um retângulo, calcula e exibe o sua área e seu perímetro.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/php/exercicio_04.php';
        $card_title = 'Exercício 4';
        $card_content = 'Lê uma nota e uma porcentagem de presença e determina a situação de um aluno.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/php/exercicio_05.php';
        $card_title = 'Exercício 5';
        $card_content = 'Lê um número n e exibe a soma de 1 até n.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/php/exercicio_06.php';
        $card_title = 'Exercício 6';
        $card_content = 'Lê cinco números e exibe uma média entre eles.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/php/exercicio_07.php';
        $card_title = 'Exercício 7';
        $card_content = 'Lê duas notas de três alunos diferentes e exibe a média de cada um.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/php/exercicio_08.php';
        $card_title = 'Exercício 8';
        $card_content = 'Lê um número n e exibe seu fatorial a partir de uma função.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/php/exercicio_09.php';
        $card_title = 'Exercício 9';
        $card_content = 'Lê um número decimal e exibe seu resultado arredondado utilizando as funções nativas.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/php/exercicio_10.php';
        $card_title = 'Exercício 10';
        $card_content = 'Lê uma sequência indefinida de números até o usuário digitar zero e exibe quantos deles são pares.';
        include './views/card_template.php';
        ?>
    </div>

</div>
</body>
</html>