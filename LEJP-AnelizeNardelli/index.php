<?php
require_once "config.php";
require_once "./views/navbar_template.php"
?>
<div class="px-8 md:px-32 py-8 flex flex-col">

    <div class="flex flex-col space-y-4 mb-8">
        <h1 class="text-5xl text-gray-900">Menu Inicial</h1>
        <p class="text-gray-700 text-base font-light">Descrição do Menu Inicial</p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
        <?php
        $card_href = BASE_URL . 'exercicios/exercicio_01.php';
        $card_title = 'Exercício 1';
        $card_content = 'Lê informações com um formulário e as exibe na tela.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/exercicio_02.php';
        $card_title = 'Exercício 2';
        $card_content = 'Lê 2 números e exibe soma, subtração, multiplicação e divisão.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/exercicio_01.php';
        $card_title = 'Exercício 3';
        $card_content = 'Lê a base e a altura de um retângulo, calcula e exibe o sua área e perímetro.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/exercicio_01.php';
        $card_title = 'Exercício 4';
        $card_content = 'Lê informações com um formulário e as exibe na tela.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/exercicio_01.php';
        $card_title = 'Exercício 5';
        $card_content = 'Lê informações com um formulário e as exibe na tela.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/exercicio_01.php';
        $card_title = 'Exercício 6';
        $card_content = 'Lê informações com um formulário e as exibe na tela.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/exercicio_01.php';
        $card_title = 'Exercício 7';
        $card_content = 'Lê informações com um formulário e as exibe na tela.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/exercicio_01.php';
        $card_title = 'Exercício 8';
        $card_content = 'Lê informações com um formulário e as exibe na tela.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/exercicio_01.php';
        $card_title = 'Exercício 9';
        $card_content = 'Lê informações com um formulário e as exibe na tela.';
        include './views/card_template.php';
        ?>
        <?php
        $card_href = BASE_URL . 'exercicios/exercicio_01.php';
        $card_title = 'Exercício 10';
        $card_content = 'Lê informações com um formulário e as exibe na tela.';
        include './views/card_template.php';
        ?>
    </div>

</div>
</body>
</html>