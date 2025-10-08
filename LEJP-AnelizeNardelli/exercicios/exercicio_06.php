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
        <h1 class="text-4xl text-gray-900">Exercício 6</h1>
        <p class="text-gray-700 text-base font-light">
            <span class="font-medium">Enunciado:</span> Utilize um <b><i>vetor</i></b> que leia <b><i>5 números</i></b> e, em sequência, exiba a <b><i>média</i></b> entre eles.
        </p>
    </div>

    <div class="flex flex-col sm:flex-row space-x-8 space-y-8">
        <div class="w-full rounded border border-gray-300 px-4 py-2 space-y-2">
            <h2 class="text-2xl text-gray-900">Resolução em JavaScript</h2>
            <div>
                <form id="mediaFormJS" class="space-y-4">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <div>
                            <label for="num<?php echo $i; ?>JS" class="block text-sm font-medium text-gray-700">Número <?php echo $i; ?>:</label>
                            <input placeholder="Número <?php echo $i; ?>" type="number" step="any" id="num<?php echo $i; ?>JS" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 numero-js">
                        </div>
                    <?php endfor; ?>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Calcular Média
                    </button>
                </form>
                <hr class="my-4">
                <h2 class="text-2xl font-normal text-gray-900 mb-2">Resultado com JavaScript:</h3>
                    <div id="resultadoJS" class="p-3 bg-white border border-gray-400 rounded-md">
                        <p>Aguardando os 5 números...</p>
                    </div>
            </div>
        </div>

        <div class="w-full rounded border border-gray-300 px-4 py-2 space-y-2">
            <h2 class="text-2xl text-gray-900">Resolução em PHP</h2>
            <div>
                <form method="POST" action="" id="mediaFormPHP" class="space-y-4">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <div>
                            <label for="num<?php echo $i; ?>PHP" class="block text-sm font-medium text-gray-700">Número <?php echo $i; ?>:</label>
                            <input placeholder="Número <?php echo $i; ?>" type="number" step="any" name="numerosPHP[]" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                value="<?php 
                                // Mantemos o valor no input se houver um post e o índice existir
                                if (isset($_POST['numerosPHP'][$i - 1])) {
                                    echo htmlspecialchars($_POST['numerosPHP'][$i - 1]);
                                }
                                ?>">
                        </div>
                    <?php endfor; ?>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Calcular Média
                    </button>
                </form>

                <hr class="my-4">

                <h3 class="text-2xl font-normal mb-2 text-gray-900">Resultado PHP:</h3>
                <div id="resultadoPHP" class="p-3 bg-white border border-gray-400 rounded-md">
                    <?php
                    // Processamento PHP
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numerosPHP']) && is_array($_POST['numerosPHP'])) {

                        // Implementamos as Validações Necessárias e processamos os dados.
                        $erros = [];
                        $numeros_validos = [];
                        
                        // Verificamos se recebemos exatamente 5 números
                        if (count($_POST['numerosPHP']) != 5) {
                            $erros[] = "Esperamos exatamente 5 números para o cálculo.";
                        } else {
                            foreach ($_POST['numerosPHP'] as $index => $valor) {
                                $num = filter_var(trim($valor), FILTER_VALIDATE_FLOAT);
                                if ($num === false || $num === null) {
                                    $erros[] = "O valor para o Número " . ($index + 1) . " não é válido.";
                                } else {
                                    $numeros_validos[] = $num;
                                }
                            }
                        }

                        if (count($erros) > 0) {
                            echo "<div class='text-red-600 font-bold'>";
                            echo implode("<br>", $erros);
                            echo "</div>";

                        } else {
                            // Se não houver erros, procedemos ao cálculo da média.
                            $soma = array_sum($numeros_validos);
                            $media = $soma / count($numeros_validos);

                            // Formatamos o resultado para exibição
                            $media_formatada = number_format($media, 2, ',', '.');
                            
                            // E exibimos os resultados
                            echo "<p>Números lidos: <strong>" . implode(', ', $numeros_validos) . "</strong></p>";
                            echo "<p>A Média dos 5 números é: <strong>{$media_formatada}</strong></p>";
                        }

                    } else {
                        echo "<p>Preencha os 5 campos e clique em 'Calcular Média'.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/script_06.js"></script>
</body>
</html>