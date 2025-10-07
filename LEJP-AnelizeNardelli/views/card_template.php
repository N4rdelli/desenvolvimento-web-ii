<?php
// Aqui estamos definindo as variáveis que serão utilizadas no card.
// As informações depois dos pontos de interrogação definem um valor padrão caso eu não defina no código.
$card_href = $card_href ?? '#';
$card_title = $card_title ?? 'Exercício 00';
$card_content = $card_content ?? 'Enunciado do exercício 00, Lorem ipsum dolor sit amet consectetur adipisicing elit.'
?>

<div class="p-4 border border-gray-200 rounded bg-white shadow-md hover:scale-105 transition-all ease-out duration-150">
    <a href="<?php echo htmlspecialchars($card_href) ?>" class="flex flex-col gap-y-2">
        <h2 class="text-2xl font-normal text-gray-700">
            <?php echo htmlspecialchars($card_title) ?>
        </h2>
        <p class="text-gray-500 font-light text-sm">
            <?php echo htmlspecialchars($card_content)?>
        </p>
    </a>
</div>