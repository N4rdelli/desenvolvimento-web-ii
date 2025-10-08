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
        <h1 class="text-4xl text-gray-900">Exercício 5</h1>
        <p class="text-gray-700 text-base font-light">
            <span class="font-medium">Enunciado:</span> Leia um número <b><i>N</i></b>. Exiba a <b><i>soma</i></b> dos números <b><i>de 1 até N</i></b>.
        </p>
    </div>

    <div class="flex flex-col sm:flex-row space-x-8 space-y-8">
        <div class="w-full rounded border border-gray-300 p-4 space-y-2 bg-white">
            <h2 class="text-2xl text-gray-900">Resolução em JavaScript</h2>
            <div>
                <form id="somaNFormJS" class="space-y-4">
                    <div>
                        <label for="numNJS" class="block text-sm font-medium text-gray-700">Número N (Inteiro Positivo):</label>
                        <input placeholder="Digite N (Ex: 10)" type="number" min="1" step="1" id="numNJS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Calcular Soma
                    </button>
                </form>
                <hr class="my-4">
                <h2 class="text-2xl font-normal text-gray-900 mb-2">Resultado com JavaScript:</h3>
                    <div id="resultadoJS" class="p-3 bg-white border border-gray-400 rounded-md">
                        <p>Aguardando o número N...</p>
                    </div>
            </div>
        </div>

        <div class="w-full rounded border border-gray-300 p-4 space-y-2 bg-white">
            <h2 class="text-2xl text-gray-900">Resolução em PHP</h2>
            <div>
                <form method="POST" action="" id="somaNFormPHP" class="space-y-4">
                    <div>
                        <label for="numNPHP" class="block text-sm font-medium text-gray-700">Número N (Inteiro Positivo):</label>
                        <input placeholder="Digite N (Ex: 10)" type="number" min="1" step="1" name="numNPHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['numNPHP']) ? htmlspecialchars($_POST['numNPHP']) : ''; ?>">
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Calcular Soma
                    </button>
                </form>

                <hr class="my-4">

                <h3 class="text-2xl font-normal mb-2 text-gray-900">Resultado PHP:</h3>
                <div id="resultadoPHP" class="p-3 bg-white border border-gray-400 rounded-md">
                    <?php
                    // Processamento PHP
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numNPHP'])) {

                        // Já declaramos a variavel garantindo que ela seja um inteiro
                        $num_n = filter_input(INPUT_POST, 'numNPHP', FILTER_VALIDATE_INT);
                        
                        $erros = [];

                        // Fazemos as validações
                        if ($num_n === false || $num_n === null || $num_n < 1) {
                            $erros[] = "O valor de N deve ser um número inteiro e positivo (N >= 1).";
                        }

                        if (count($erros) > 0) {
                            echo "<div class='text-red-600 font-bold'>";
                            echo implode("<br>", $erros);
                            echo "</div>";

                        } else {
                            $soma_iterativa = 0;
                            for ($i = 1; $i <= $num_n; $i++) {
                                $soma_iterativa += $i;
                            }
                            $soma_formula = ($num_n * ($num_n + 1)) / 2;

                            echo "<p>Para N = <strong>{$num_n}</strong>:</p>";
                            echo "<p>Soma (1 até N): <strong>{$soma_iterativa}</strong></p>";
                            echo "<p class='text-sm text-gray-500'>(Pela Fórmula: {$soma_formula})</p>";
                        }

                    } else {
                        echo "<p>Preencha o campo e clique em 'Calcular Soma'.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/script_05.js"></script>
</body>
</html>