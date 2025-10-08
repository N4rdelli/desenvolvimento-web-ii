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
        <h1 class="text-4xl text-gray-900">Exercício 4</h1>
        <p class="text-gray-700 text-base font-light">
            <span class="font-medium">Enunciado:</span> Leia uma nota e uma porcentagem de presença. Informe se o aluno
            <b><i>aprovou</i></b> (com nota igual ou superior a 6), se o aluno foi para a <b><i>segunda época</i></b>
            (com nota igual ou maior que 4 e menor que 6), se o aluno <b><i>reprovou por nota</i></b> (com nota inferior
            a 4) ou se o aluno <b><i>reprovou por falta</i></b> (com presença inferior a 75%).
        </p>
    </div>

    <div class="flex flex-col sm:flex-row space-x-8 space-y-8">
        <div class="w-full rounded border border-gray-300 p-4 space-y-2 bg-white">
            <h2 class="text-2xl text-gray-900">Resolução em JavaScript</h2>
            <div>
                <form id="avaliacaoFormJS" class="space-y-4">
                    <div>
                        <label for="notaJS" class="block text-sm font-medium text-gray-700">Nota (0 a 10):</label>
                        <input placeholder="Ex: 7.5" type="number" step="0.1" min="0" max="10" id="notaJS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div>
                        <label for="presencaJS" class="block text-sm font-medium text-gray-700">Presença (%):</label>
                        <input placeholder="Ex: 85" type="number" step="0.1" min="0" max="100" id="presencaJS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Avaliar Aluno
                    </button>
                </form>
                <hr class="my-4">
                <h2 class="text-2xl font-normal text-gray-900 mb-2">Resultado com JavaScript:</h3>
                    <div id="resultadoJS" class="p-3 bg-white border border-gray-400 rounded-md">
                        <p>Aguardando avaliação...</p>
                    </div>
            </div>
        </div>

        <div class="w-full rounded border border-gray-300 p-4 space-y-2 bg-white">
            <h2 class="text-2xl text-gray-900">Resolução em PHP</h2>
            <div>
                <form method="POST" action="" id="avaliacaoFormPHP" class="space-y-4">
                    <div>
                        <label for="notaPHP" class="block text-sm font-medium text-gray-700">Nota (0 a 10):</label>
                        <input placeholder="Ex: 7.5" type="number" step="0.1" min="0" max="10" name="notaPHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['notaPHP']) ? htmlspecialchars($_POST['notaPHP']) : ''; ?>">
                    </div>

                    <div>
                        <label for="presencaPHP" class="block text-sm font-medium text-gray-700">Presença (%):</label>
                        <input placeholder="Ex: 85" type="number" step="0.1" min="0" max="100" name="presencaPHP"
                            required class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['presencaPHP']) ? htmlspecialchars($_POST['presencaPHP']) : ''; ?>">
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Avaliar Aluno
                    </button>
                </form>

                <hr class="my-4">

                <h3 class="text-2xl font-normal mb-2 text-gray-900">Resultado PHP:</h3>
                <div id="resultadoPHP" class="p-3 bg-white border border-gray-400 rounded-md">
                    <?php
                    // Precisamos declarar a constante de pesença mínima num escopo global
                    const PRESENCA_MINIMA = 75.0;

                    // Processamento PHP
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['notaPHP'], $_POST['presencaPHP'])) {

                        $nota = filter_input(INPUT_POST, 'notaPHP', FILTER_VALIDATE_FLOAT);
                        $presenca = filter_input(INPUT_POST, 'presencaPHP', FILTER_VALIDATE_FLOAT);

                        $erros = [];

                        // Implementamos as validações relacianas aos inputs
                        if ($nota === false || $nota === null || $nota < 0 || $nota > 10) {
                            $erros[] = "O valor da Nota deve ser entre 0 e 10.";
                        }
                        if ($presenca === false || $presenca === null || $presenca < 0 || $presenca > 100) {
                            $erros[] = "O valor da Presença deve ser entre 0% e 100%.";
                        }

                        if (count($erros) > 0) {
                            echo "<div class='text-red-600 font-bold'>";
                            echo implode("<br>", $erros);
                            echo "</div>";

                        } else {
                            // Verificamos o estado do estudante
                            if ($presenca < PRESENCA_MINIMA) {
                                $mensagem = "REPROVADO POR FALTA.";
                                $classe_tailwind = "text-red-600 font-bold";

                            } else if ($nota >= 6.0) {
                                $mensagem = "APROVADO!";
                                $classe_tailwind = "text-green-600 font-bold";

                            } else if ($nota >= 4.0 && $nota < 6.0) {
                                $mensagem = "SEGUNDA ÉPOCA (Recuperação).";
                                $classe_tailwind = "text-yellow-600 font-bold";

                            } else {
                                $mensagem = "REPROVADO POR NOTA.";
                                $classe_tailwind = "text-red-600 font-bold";
                            }

                            // Formatamos a saída
                            $presenca_formatada = number_format($presenca, 1, ',', '.');
                            $nota_formatada = number_format($nota, 1, ',', '.');


                            // E exibimos os valores
                            echo "<p>Nota: <strong>{$nota_formatada}</strong> | Presença: <strong>{$presenca_formatada}%</strong></p>";
                            echo "<p class='{$classe_tailwind}'>Situação: {$mensagem}</p>";
                        }

                    } else {
                        echo "<p>Preencha os campos e clique em 'Avaliar Aluno'.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/script_04.js"></script>
</body>

</html>