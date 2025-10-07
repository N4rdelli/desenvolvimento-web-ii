<?php
// Aqui estamos definindo as variáveis que serão utilizadas no card.
// As informações depois dos pontos de interrogação definem um valor padrão caso eu não defina no código.
$card_href = $card_href ?? '#';
$card_title = $card_title ?? 'Exercício 00';
$card_content = $card_content ?? 'Enunciado do exercício 00, Lorem ipsum dolor sit amet consectetur adipisicing elit.'
?>

<div>
    <a href="<?php echo htmlspecialchars($card_href) ?>">
        <h3>
            <?php echo htmlspecialchars($card_title) ?>
        </h3>
        <p>
            <?php echo htmlspecialchars($card_content)?>
        </p>
    </a>
</div>