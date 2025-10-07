<?php
require_once "../config.php";
require_once "../views/navbar_template.php";

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
        <h1 class="text-4xl text-gray-900">Exercício 3</h1>
        <p class="text-gray-700 text-base font-light"><span class="font-medium">Enunciado:</span> Leia a base e a altura de um retângulo.
            Calcule e exiba a <b><i>Área</i></b> e o <b><i>Perímetro</i></b> do retângulo.
        </p>
    </div>

    <div class="flex flex-col sm:flex-row space-x-8 space-y-8">
        <div class="w-full rounded border border-gray-300 px-4 py-2 space-y-2">
            <h2 class="text-2xl text-gray-900">Resolução em JavaScript</h2>
            <div>
                <form id="retanguloFormJS" class="space-y-4">
                    <div>
                        <label for="baseJS" class="block text-sm font-medium text-gray-700">Base do Retângulo:</label>
                        <input placeholder="Digite o valor da base" type="number" step="any" id="baseJS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div>
                        <label for="alturaJS" class="block text-sm font-medium text-gray-700">Altura do Retângulo:</label>
                        <input placeholder="Digite o valor da altura" type="number" step="any" id="alturaJS" required
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
                <form method="POST" action="" id="retanguloFormPHP" class="space-y-4">
                    <div>
                        <label for="basePHP" class="block text-sm font-medium text-gray-700">Base do Retângulo:</label>
                        <input placeholder="Digite o valor da base" type="number" step="any" name="basePHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['basePHP']) ? htmlspecialchars($_POST['basePHP']) : ''; ?>">
                    </div>

                    <div>
                        <label for="alturaPHP" class="block text-sm font-medium text-gray-700">Altura do Retângulo:</label>
                        <input placeholder="Digite o valor da altura" type="number" step="any" name="alturaPHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['alturaPHP']) ? htmlspecialchars($_POST['alturaPHP']) : ''; ?>">
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
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['basePHP'], $_POST['alturaPHP'])) {

                        $base = filter_input(INPUT_POST, 'basePHP', FILTER_VALIDATE_FLOAT);
                        $altura = filter_input(INPUT_POST, 'alturaPHP', FILTER_VALIDATE_FLOAT);
                        
                        $erros = [];

                        // Verificamos se os inputs são números válidos (float)
                        if ($base === false || $base === null || $base < 0) {
                            $erros[] = "O valor da Base é inválido ou negativo.";
                        }
                        if ($altura === false || $altura === null || $altura < 0) {
                            $erros[] = "O valor da Altura é inválido ou negativo.";
                        }

                        if (count($erros) > 0) {
                            echo "<div class='text-red-600 font-bold'>";
                            echo implode("<br>", $erros);
                            echo "</div>";

                        } else {
                            // Efetuamos os cáculos
                            $area = $base * $altura;
                            $perimetro = 2 * ($base + $altura);
                            
                            // Formatamos as saídas
                            $area_formatada = number_format($area, 2, ',', '.');
                            $perimetro_formatado = number_format($perimetro, 2, ',', '.');
                            
                            // E finalmente exibimos o resultado formatado
                            echo "<p>Área do Retângulo: <strong>{$area_formatada}</strong></p>";
                            echo "<p>Perímetro do Retângulo: <strong>{$perimetro_formatado}</strong></p>";
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

<script src="./js/script_03.js"></script>
</body>
</html>