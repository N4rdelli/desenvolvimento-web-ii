<?php
require_once "../../config.php";
require_once "../../views/navbar_template.php";

$fallback_link = $fallback_url ?? BASE_URL . 'index.php';
$link_voltar = 'javascript:history.back()';
$num_alunos = 3;
$num_notas = 2;
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
        <h1 class="text-4xl text-gray-900">Exercício 7 (Refatorado)</h1>
        <p class="text-gray-700 text-base font-light">
            <span class="font-medium">Enunciado:</span> Utilize uma <b><i>matriz</i></b> que leia <b><i>2 notas</i></b> de <b><i>3 alunos</i></b> diferentes. Exiba a <b><i>média</i></b> de <b><i>cada aluno</i></b>.
        </p>
    </div>

    <div class="flex flex-col sm:flex-row space-x-8 space-y-8">
        <div class="w-full rounded border border-gray-300 px-4 py-2 space-y-2">
            <h2 class="text-2xl text-gray-900">Resolução em JavaScript</h2>
            <div>
                <form id="matrizNotasFormJS" class="space-y-4">
                    <fieldset class="border border-indigo-300 p-3 rounded-md space-y-2">
                        <legend class="text-lg font-medium text-indigo-700">Aluno 1</legend>
                        <div>
                            <label for="a1n1JS" class="block text-sm font-medium text-gray-700">Nota 1:</label>
                            <input placeholder="Nota 1" type="number" step="0.1" min="0" max="10" id="a1n1JS" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 nota-js" 
                                data-aluno="1" data-nota="1">
                        </div>
                        <div>
                            <label for="a1n2JS" class="block text-sm font-medium text-gray-700">Nota 2:</label>
                            <input placeholder="Nota 2" type="number" step="0.1" min="0" max="10" id="a1n2JS" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 nota-js" 
                                data-aluno="1" data-nota="2">
                        </div>
                    </fieldset>

                    <fieldset class="border border-indigo-300 p-3 rounded-md space-y-2">
                        <legend class="text-lg font-medium text-indigo-700">Aluno 2</legend>
                        <div>
                            <label for="a2n1JS" class="block text-sm font-medium text-gray-700">Nota 1:</label>
                            <input placeholder="Nota 1" type="number" step="0.1" min="0" max="10" id="a2n1JS" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 nota-js" 
                                data-aluno="2" data-nota="1">
                        </div>
                        <div>
                            <label for="a2n2JS" class="block text-sm font-medium text-gray-700">Nota 2:</label>
                            <input placeholder="Nota 2" type="number" step="0.1" min="0" max="10" id="a2n2JS" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 nota-js" 
                                data-aluno="2" data-nota="2">
                        </div>
                    </fieldset>

                    <fieldset class="border border-indigo-300 p-3 rounded-md space-y-2">
                        <legend class="text-lg font-medium text-indigo-700">Aluno 3</legend>
                        <div>
                            <label for="a3n1JS" class="block text-sm font-medium text-gray-700">Nota 1:</label>
                            <input placeholder="Nota 1" type="number" step="0.1" min="0" max="10" id="a3n1JS" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 nota-js" 
                                data-aluno="3" data-nota="1">
                        </div>
                        <div>
                            <label for="a3n2JS" class="block text-sm font-medium text-gray-700">Nota 2:</label>
                            <input placeholder="Nota 2" type="number" step="0.1" min="0" max="10" id="a3n2JS" required
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 nota-js" 
                                data-aluno="3" data-nota="2">
                        </div>
                    </fieldset>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Calcular Médias
                    </button>
                </form>
                <hr class="my-4">
                <h2 class="text-2xl font-normal text-gray-900 mb-2">Resultado com JavaScript:</h3>
                    <div id="resultadoJS" class="p-3 bg-white border border-gray-400 rounded-md">
                        <p>Aguardando as 6 notas...</p>
                    </div>
            </div>
        </div>

        <div class="w-full rounded border border-gray-300 px-4 py-2 space-y-2">
            <h2 class="text-2xl text-gray-900">Resolução em PHP</h2>
            <div>
                <form method="POST" action="" id="matrizNotasFormPHP" class="space-y-4">
                    <?php for ($a = 1; $a <= $num_alunos; $a++): ?>
                        <fieldset class="border border-indigo-300 p-3 rounded-md space-y-2">
                            <legend class="text-lg font-medium text-indigo-700">Aluno <?php echo $a; ?></legend>
                            <?php for ($n = 1; $n <= $num_notas; $n++): ?>
                                <div>
                                    <label for="aluno<?php echo $a; ?>nota<?php echo $n; ?>PHP" class="block text-sm font-medium text-gray-700">Nota <?php echo $n; ?>:</label>
                                    <input placeholder="Nota <?php echo $n; ?>" type="number" step="0.1" min="0" max="10" 
                                        name="notasPHP[<?php echo $a; ?>][<?php echo $n; ?>]" required
                                        class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                        value="<?php 
                                        if (isset($_POST['notasPHP'][$a][$n])) {
                                            echo htmlspecialchars($_POST['notasPHP'][$a][$n]);
                                        }
                                        ?>">
                                </div>
                            <?php endfor; ?>
                        </fieldset>
                    <?php endfor; ?>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Calcular Médias
                    </button>
                </form>

                <hr class="my-4">

                <h3 class="text-2xl font-normal mb-2 text-gray-900">Resultado PHP:</h3>
                <div id="resultadoPHP" class="p-3 bg-white border border-gray-400 rounded-md">
                    <?php
                    // Definimos o número de alunos e notas para referência
                    $NUM_ALUNOS = 3;
                    $NUM_NOTAS = 2;

                    // Processamento PHP
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && 
                        isset($_POST['notasPHP']) && 
                        is_array($_POST['notasPHP']) &&
                        count($_POST['notasPHP']) == $NUM_ALUNOS
                    ) {

                        // Implementamos as Validações Necessárias e preparamos a matriz para processamento.
                        $erros = [];
                        $medias_alunos = [];

                        for ($a = 1; $a <= $NUM_ALUNOS; $a++) {
                            // Verificamos se as notas para este aluno existem no POST
                            if (!isset($_POST['notasPHP'][$a]) || count($_POST['notasPHP'][$a]) != $NUM_NOTAS) {
                                $erros[] = "Faltam notas para o Aluno " . $a . ".";
                                continue;
                            }

                            $soma_notas = 0;
                            $notas_validas = 0;
                            $notas_aluno = $_POST['notasPHP'][$a];

                            for ($n = 1; $n <= $NUM_NOTAS; $n++) {
                                // Capturamos o valor e validamos
                                $valor = filter_var(trim($notas_aluno[$n] ?? ''), FILTER_VALIDATE_FLOAT);

                                // Verificamos se é um número válido e está dentro do intervalo
                                if ($valor === false || $valor === null || $valor < 0 || $valor > 10) {
                                    $erros[] = "A Nota {$n} do Aluno {$a} é inválida ou está fora do intervalo (0-10).";
                                } else {
                                    $soma_notas += $valor;
                                    $notas_validas++;
                                }
                            }
                            
                            // Calculamos a média individual, se não houver erros
                            if (empty($erros)) {
                                $medias_alunos[$a] = $soma_notas / $NUM_NOTAS;
                            }
                        }

                        if (count($erros) > 0) {
                            echo "<div class='text-red-600 font-bold'>";
                            echo implode("<br>", $erros);
                            echo "</div>";

                        } else {
                            // Se não houver erros, exibimos as médias de cada aluno.
                            
                            echo "<p class='font-bold mb-2'>Médias dos Alunos:</p>";
                            
                            foreach ($medias_alunos as $aluno_id => $media) {
                                $media_formatada = number_format($media, 2, ',', '.');
                                echo "<p>Aluno {$aluno_id}: <strong>{$media_formatada}</strong></p>";
                            }
                        }

                    } else {
                        echo "<p>Preencha todas as notas e clique em 'Calcular Médias'.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/script_07.js"></script>
</body>
</html>