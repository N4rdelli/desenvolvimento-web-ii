<?php
require_once "../../config.php";
require_once "../../views/navbar_template.php";

$fallback_link = $fallback_url ?? BASE_URL . 'index.php';
$link_voltar = 'javascript:history.back()';
?>

<div class="px-8 md:px-32 py-8 flex flex-col space-y-8">
    <div>
        <a href=" <?php echo htmlspecialchars($link_voltar); ?>"
            onclick="if(history.length <= 1) { this.href = '<?php echo htmlspecialchars($fallback_link); ?>'; }"
            class="inline-flex items-center gap-2 text-gray-400 hover:text-indigo-700 transition-all ease-out duration-150">
            <span class="text-xl font-bold">&leftarrow;</span> Voltar
        </a>
    </div>

    <div class="flex flex-col space-y-2 mb-8">
        <h1 class="text-4xl text-gray-900">Exercício 9</h1>
        <p class="text-gray-700 text-base font-light">
            <span class="font-medium">Enunciado:</span> Leia um <b><i>número</i></b> e exiba seu valor <b><i>arredondado</i></b>. Utilize as <b><i>funções matemáticas</i></b>: <b><i>ceil</i></b> e <b><i>floor</i></b> do JavaScript e do PHP.
        </p>
    </div>

    <div class="flex flex-col sm:flex-row space-x-8 space-y-8">
        <div class="w-full rounded border border-gray-300 p-4 space-y-2 bg-white">
            <h2 class="text-2xl text-gray-900">Resolução em JavaScript</h2>
            <div>
                <form id="arredondamentoFormJS" class="space-y-4">
                    <div>
                        <label for="numDecimalJS" class="block text-sm font-medium text-gray-700">Número Decimal:</label>
                        <input placeholder="Ex: 5.7 ou -3.2" type="number" step="any" id="numDecimalJS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Arredondar
                    </button>
                </form>
                <hr class="my-4">
                <h2 class="text-2xl font-normal text-gray-900 mb-2">Resultado com JavaScript:</h3>
                    <div id="resultadoJS" class="p-3 bg-white border border-gray-400 rounded-md">
                        <p>Aguardando o número decimal...</p>
                    </div>
            </div>
        </div>

        <div class="w-full rounded border border-gray-300 p-4 space-y-2 bg-white">
            <h2 class="text-2xl text-gray-900">Resolução em PHP</h2>
            <div>
                <form method="POST" action="" id="arredondamentoFormPHP" class="space-y-4">
                    <div>
                        <label for="numDecimalPHP" class="block text-sm font-medium text-gray-700">Número Decimal:</label>
                        <input placeholder="Ex: 5.7 ou -3.2" type="number" step="any" name="numDecimalPHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['numDecimalPHP']) ? htmlspecialchars($_POST['numDecimalPHP']) : ''; ?>">
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Arredondar
                    </button>
                </form>

                <hr class="my-4">

                <h3 class="text-2xl font-normal mb-2 text-gray-900">Resultado PHP:</h3>
                <div id="resultadoPHP" class="p-3 bg-white border border-gray-400 rounded-md">
                    <?php
                    // Processamento PHP
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numDecimalPHP'])) {

                        // Primeiramente apturamos e validamos o input para garantir que é um número float
                        $num_decimal = filter_input(INPUT_POST, 'numDecimalPHP', FILTER_VALIDATE_FLOAT);
                        
                        $erros = [];

                        // Implementamos a validação necessária
                        if ($num_decimal === false || $num_decimal === null) {
                            $erros[] = "O valor inserido não é um número válido.";
                        }

                        if (count($erros) > 0) {
                            echo "<div class='text-red-600 font-bold'>";
                            echo implode("<br>", $erros);
                            echo "</div>";

                        } else {
                            // Em seguida calculamos o arredondamento para cima (ceil) e para baixo (floor)
                            $arredondado_ceil = ceil($num_decimal);
                            $arredondado_floor = floor($num_decimal);
                            
                            // Formatamos o número original para exibição
                            $num_formatado = number_format($num_decimal, 2, ',', '.');

                            // E exibimos os resultados
                            echo "<p>Número Original: <strong>{$num_formatado}</strong></p>";
                            echo "<hr class='my-2 border-gray-300'>";
                            echo "<p>Arredondamento para CIMA (ceil): <strong>{$arredondado_ceil}</strong></p>";
                            echo "<p>Arredondamento para BAIXO (floor): <strong>{$arredondado_floor}</strong></p>";
                        }

                    } else {
                        echo "<p>Preencha o campo com um número decimal e clique em 'Arredondar'.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/script_09.js"></script>
</body>
</html>