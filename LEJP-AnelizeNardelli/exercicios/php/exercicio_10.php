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
        <h1 class="text-4xl text-gray-900">Exercício 10</h1>
        <p class="text-gray-700 text-base font-light">
            <span class="font-medium">Enunciado:</span> Leia <b><i>números</i></b> até o <b><i>usuário digitar 0</i></b> (zero). Exiba quantos <b><i>números pares</i></b> foram digitados.
        </p>
    </div>

    <div class="flex flex-col sm:flex-row space-x-8 space-y-8">
        <div class="w-full rounded border border-gray-300 p-4 space-y-2 bg-white">
            <h2 class="text-2xl text-gray-900">Resolução em JavaScript</h2>
            <div>
                <form id="contagemParesFormJS" class="space-y-4">
                    <div>
                        <label for="numerosJS" class="block text-sm font-medium text-gray-700">Digite os números separados por espaço ou vírgula (Termine com 0):</label>
                        <textarea placeholder="Ex: 2, 4, 7, 8, 1, 0, 9" id="numerosJS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 h-24"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Contar Pares
                    </button>
                </form>
                <hr class="my-4">
                <h2 class="text-2xl font-normal text-gray-900 mb-2">Resultado com JavaScript:</h3>
                    <div id="resultadoJS" class="p-3 bg-white border border-gray-400 rounded-md">
                        <p>Aguardando os números...</p>
                    </div>
            </div>
        </div>

        <div class="w-full rounded border border-gray-300 p-4 space-y-2 bg-white">
            <h2 class="text-2xl text-gray-900">Resolução em PHP</h2>
            <div>
                <form method="POST" action="" id="contagemParesFormPHP" class="space-y-4">
                    <div>
                        <label for="numerosPHP" class="block text-sm font-medium text-gray-700">Digite os números separados por espaço ou vírgula (Termine com 0):</label>
                        <textarea placeholder="Ex: 2, 4, 7, 8, 1, 0, 9" name="numerosPHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 h-24"><?php echo isset($_POST['numerosPHP']) ? htmlspecialchars($_POST['numerosPHP']) : ''; ?></textarea>
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Contar Pares
                    </button>
                </form>

                <hr class="my-4">

                <h3 class="text-2xl font-normal mb-2 text-gray-900">Resultado PHP:</h3>
                <div id="resultadoPHP" class="p-3 bg-white border border-gray-400 rounded-md">
                    <?php
                    // Definimos a constante para o número de parada
                    const NUMERO_PARADA = 0;

                    // Processamento PHP
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numerosPHP'])) {

                        // Limpamos e separamos a string de input em um vetor de valores
                        $input_limpo = preg_replace('/[^\d\s\-,]+/', '', $_POST['numerosPHP']);
                        // Fazemos isso separando por vírgula ou espaço e removendo entradas vazias
                        $valores_str = preg_split('/[\s,]+/', $input_limpo, -1, PREG_SPLIT_NO_EMPTY);
                        
                        $contador_pares = 0;
                        $erros = [];
                        $numeros_lidos = [];
                        $parada_encontrada = false;

                        foreach ($valores_str as $valor) {
                            // Capturamos e validamos o input para garantir que é um inteiro
                            $num = filter_var(trim($valor), FILTER_VALIDATE_INT);

                            // Implementamos as Validações Necessárias
                            if ($num === false || $num === null) {
                                $erros[] = "O valor '{$valor}' é inválido. Esperamos apenas números inteiros.";
                                // Quebramos o loop no primeiro erro para simplificar
                                break;
                            }
                            if ($num === NUMERO_PARADA) {
                                $parada_encontrada = true;
                                break; // Paramos de contar/ler
                            }
                            if ($num % 2 === 0) {
                                $contador_pares++;
                            }
                            
                            // Adicionamos à lista de números processados
                            $numeros_lidos[] = $num;
                        }

                        if (!empty($erros)) {
                            echo "<div class='text-red-600 font-bold'>";
                            echo implode("<br>", $erros);
                            echo "</div>";

                        } else if (!$parada_encontrada) {
                             echo "<div class='text-red-600 font-bold'>Atenção: O número de parada (0) não foi digitado. Contamos todos os números válidos inseridos.</div>";
                             echo "<p>Números lidos: <strong>" . implode(', ', $numeros_lidos) . "</strong></p>";
                             echo "<p>Total de Pares encontrados: <strong>{$contador_pares}</strong></p>";
                        } else {
                            // Exibimos os resultados
                            echo "<p>Números lidos (até o 0): <strong>" . implode(', ', $numeros_lidos) . "</strong></p>";
                            echo "<p>Total de Pares encontrados: <strong>{$contador_pares}</strong></p>";
                        }

                    } else {
                        echo "<p>Preencha o campo com números inteiros e termine com 0 para ver o resultado.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/script_10.js"></script>
</body>
</html>