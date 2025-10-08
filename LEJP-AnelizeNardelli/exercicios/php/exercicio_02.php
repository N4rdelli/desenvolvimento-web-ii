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
        <h1 class="text-4xl text-gray-900">Exercício 2</h1>
        <p class="text-gray-700 text-base font-light"><span class="font-medium">Enunciado:</span> Leia dois números.
            Exiba a <b><i>Soma</i></b>, <b><i>Subtração</i></b>, <b><i>Multiplicação</i></b> e <b><i>Divisão</i></b>.
            </p>
    </div>

    <div class="flex flex-col sm:flex-row space-x-8 space-y-8">
        <div class="w-full rounded border border-gray-300 px-4 py-2 space-y-2">
            <h2 class="text-2xl text-gray-900">Resolução em JavaScript</h2>
            <div>
                <form id="calculadoraFormJS" class="space-y-4">
                    <div>
                        <label for="num1JS" class="block text-sm font-medium text-gray-700">Primeiro Número:</label>
                        <input placeholder="Digite o primeiro número" type="number" step="any" id="num1JS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div>
                        <label for="num2JS" class="block text-sm font-medium text-gray-700">Segundo Número:</label>
                        <input placeholder="Digite o segundo número" type="number" step="any" id="num2JS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Calcular
                    </button>
                </form>
                <hr class="my-4">
                <h2 class="text-2xl font-normal text-gray-900 mb-2">Resultado com JavaScript:</h3>
                    <div id="resultadoJS" class="p-3 bg-white border border-gray-400 rounded-md">
                        <p>Aguardando o cálculo...</p>
                    </div>
            </div>
        </div>
        
        <div class="w-full rounded border border-gray-300 px-4 py-2 space-y-2">
            <h2 class="text-2xl text-gray-900">Resolução em PHP</h2>
            <div>
                <form method="POST" action="" id="calculadoraFormPHP" class="space-y-4">
                    <div>
                        <label for="num1PHP" class="block text-sm font-medium text-gray-700">Primeiro Número:</label>
                        <input placeholder="Digite o primeiro número" type="number" step="any" name="num1PHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['num1PHP']) ? htmlspecialchars($_POST['num1PHP']) : ''; ?>">
                    </div>

                    <div>
                        <label for="num2PHP" class="block text-sm font-medium text-gray-700">Segundo Número:</label>
                        <input placeholder="Digite o segundo número" type="number" step="any" name="num2PHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['num2PHP']) ? htmlspecialchars($_POST['num2PHP']) : ''; ?>">
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Calcular
                    </button>
                </form>

                <hr class="my-4">

                <h3 class="text-2xl font-normal mb-2 text-gray-900">Resultado PHP:</h3>
                <div id="resultadoPHP" class="p-3 bg-white border border-gray-400 rounded-md">
                    <?php
                    // Processamento PHP
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num1PHP'], $_POST['num2PHP'])) {

                        $num1 = filter_input(INPUT_POST, 'num1PHP', FILTER_VALIDATE_FLOAT);
                        $num2 = filter_input(INPUT_POST, 'num2PHP', FILTER_VALIDATE_FLOAT);
                        
                        $erros = [];

                        // Verificamos se os inputs são números válidos (float)
                        if ($num1 === false || $num1 === null) {
                            $erros[] = "O Primeiro Número é inválido.";
                        }
                        if ($num2 === false || $num2 === null) {
                            $erros[] = "O Segundo Número é inválido.";
                        }

                        if (count($erros) > 0) {
                            echo "<div class='text-red-600 font-bold'>";
                            echo implode("<br>", $erros);
                            echo "</div>";

                        } else {
                            // Fazemos as operações
                            $soma           = $num1 + $num2;
                            $subtracao      = $num1 - $num2;
                            $multiplicacao  = $num1 * $num2;
                            
                            // Validamos o que for necessário
                            if ($num2 == 0) {
                                $divisao = "Não é possível dividir por zero (0)";
                            } else {
                                $divisao = $num1 / $num2;
                                // Formatamos as saídas
                                $divisao = number_format($divisao, 2, ',', '.'); 
                            }
                            
                            // E finalmente exibimos os resultados
                            echo "<p>Soma: <strong>" . number_format($soma, 2, ',', '.') . "</strong></p>";
                            echo "<p>Subtração: <strong>" . number_format($subtracao, 2, ',', '.') . "</strong></p>";
                            echo "<p>Multiplicação: <strong>" . number_format($multiplicacao, 2, ',', '.') . "</strong></p>";
                            echo "<p>Divisão: <strong>{$divisao}</strong></p>";
                        }

                    } else {
                        echo "<p>Preencha os campos e clique em 'Calcular'.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/script_02.js"></script>
</body>
</html>