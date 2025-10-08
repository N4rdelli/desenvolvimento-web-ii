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
        <h1 class="text-4xl text-gray-900">Exercício 1</h1>
        <p class="text-gray-700 text-base font-light"><span class="font-medium">Enunciado:</span> Leia um nome completo,
            email, telefone e idade. Exiba como no exemplo: "<b><i>Nome Completo</i></b> tem <b><i>Idade</i></b> anos.
            Seu email: <b><i>nome.sobrenome@email.com</i></b> e telefone:<b><i>(014) 99102-3456</i></b>"</p>
    </div>

    <div class="flex flex-col sm:flex-row space-x-8 space-y-8">
        <div class="w-full rounded border border-gray-300 p-4 space-y-2 bg-white">
            <!-- Resolução em JavaScript -->
            <h2 class="text-2xl text-gray-900">Resolução em JavaScript</h2>
            <div>
                <form id="cadastroFormJS" class="space-y-4">
                    <div>
                        <label for="nomeJS" class="block text-sm font-medium text-gray-700">Nome Completo:</label>
                        <input placeholder="Digite seu Nome Completo" type="text" id="nomeJS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div>
                        <label for="emailJS" class="block text-sm font-medium text-gray-700">E-mail:</label>
                        <input placeholder="Digite seu melhor email" type="email" id="emailJS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div>
                        <label for="telefoneJS" class="block text-sm font-medium text-gray-700">Telefone (Somente
                            números):</label>
                        <input placeholder="Digite seu número de telefone celular" type="tel" id="telefoneJS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div>
                        <label for="idadeJS" class="block text-sm font-medium text-gray-700">Idade:</label>
                        <input placeholder="Informe sua idade" type="number" id="idadeJS" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Exibir Informações
                    </button>
                </form>
                <hr class="my-4">
                <h2 class="text-2xl font-normal text-gray-900 mb-2">Resultado com JavaScript:</h3>
                    <p id="resultadoJS" class="p-3 bg-white border border-gray-400 rounded-md"></p>
            </div>
        </div>
        <div class="w-full rounded border border-gray-300 p-4 space-y-2 bg-white">
            <!-- Resolução com PHP -->
            <h2 class="text-2xl text-gray-900">Resolução em PHP</h2>
            <div>
                <form method="POST" action="" id="cadastroFormPHP" class="space-y-4">
                    <div>
                        <label for="nomePHP" class="block text-sm font-medium text-gray-700">Nome Completo:</label>
                        <input placeholder="Digite seu Nome Completo" type="text" name="nomePHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['nomePHP']) ? htmlspecialchars($_POST['nomePHP']) : ''; ?>">
                    </div>

                    <div>
                        <label for="emailPHP" class="block text-sm font-medium text-gray-700">E-mail:</label>
                        <input placeholder="Digite seu melhor Email" type="email" name="emailPHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['emailPHP']) ? htmlspecialchars($_POST['emailPHP']) : ''; ?>">
                    </div>

                    <div>
                        <label for="telefonePHP" class="block text-sm font-medium text-gray-700">Telefone (Somente
                            números):</label>
                        <input placeholder="Digite seu número de telefone celular" type="text" name="telefonePHP"
                            required class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['telefonePHP']) ? htmlspecialchars($_POST['telefonePHP']) : ''; ?>">
                    </div>

                    <div>
                        <label for="idadePHP" class="block text-sm font-medium text-gray-700">Idade:</label>
                        <input placeholder="Informe sua Idade" type="number" name="idadePHP" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="<?php echo isset($_POST['idadePHP']) ? htmlspecialchars($_POST['idadePHP']) : ''; ?>">
                    </div>

                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-normal font-medium text-white bg-indigo-700 hover:bg-indigo-900">
                        Exibir Informações
                    </button>
                </form>

                <hr class="my-4">

                <h3 class="text-2xl font-normal mb-2 text-gray-900">Resultado PHP:</h3>
                <div id="resultadoPHP" class="p-3 bg-white border border-gray-400 rounded-md">
                    <?php
                    // Verificamos se a requisição é do tipo POST antes de executar o código
                    if (
                        $_SERVER["REQUEST_METHOD"] == "POST" &&
                        isset($_POST['nomePHP'], $_POST['emailPHP'], $_POST['telefonePHP'], $_POST['idadePHP'])
                    ) {

                        // Selecionamos as variávis com quais vamos trabalhar
                        $erros = [];

                        $nome = trim($_POST['nomePHP']);
                        $email = trim($_POST['emailPHP']);
                        $telefone = trim($_POST['telefonePHP']);
                        $idade = (int) $_POST['idadePHP'];


                        // Em seguida, fazemos as validaações necessárias, assim como no JavaScript
                        if (strlen($nome) < 3) {
                            $erros[] = "O Nome Completo deve ter mais de 3 letras.";
                        }

                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $erros[] = "O Email fornecido não é válido.";
                        }

                        if ($idade < 0) {
                            $erros[] = "A Idade deve ser um número não negativo.";
                        }

                        // Se houveram erros, exibimos eles
                        if (count($erros) > 0) {
                            echo "<div class='erro'>";
                            echo "Houve(ram) erro(s) de validação:<br>";
                            echo implode("<br>", $erros);
                            echo "</div>";

                        } else {
                            // Se não hoouveram erros, formatamos as saídas e exibimos elas
                    
                            $telefoneLimpo = preg_replace('/[^0-9]/', '', $telefone);
                            $telefoneFormatado = preg_replace('/^(\d{2})(\d{5})(\d{4})$/', '($1) $2-$3', $telefoneLimpo);
                            if ($telefoneFormatado === $telefoneLimpo) {
                                $telefoneFormatado = preg_replace('/^(\d{2})(\d{4})(\d{4})$/', '($1) $2-$3', $telefoneLimpo);
                            }
                            $nomeSeguro = htmlspecialchars($nome);
                            $emailSeguro = htmlspecialchars($email);


                            $mensagem = "{$nomeSeguro} tem {$idade} anos. Seu email: {$emailSeguro} e telefone:{$telefoneFormatado}";
                            echo "<p><strong>{$mensagem}</strong></p>";
                        }

                    } else {
                        // Exibe mensagem inicial
                        echo "<p>Preencha o formulário e clique em 'Exibir Informações'.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/script_01.js"></script>

</body>

</html>