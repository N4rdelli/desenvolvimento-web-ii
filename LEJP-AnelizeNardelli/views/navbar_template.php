<?php
$current_page = basename($_SERVER['PHP_SELF']);

$base_link_class = 'py-4 px-4 m-0 transition-all ease-out duration-150';
$inactive_classes = 'py-4 px-4 m-0 text-gray-400 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-600 transition-all ease-out duration-150';
$active_classes = 'py-4 px-4 m-0 text-gray-900 border-b-2 border-indigo-700 transition-all ease-out duration-150';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link da font utilizada -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">

    <!-- Tailwind Link -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

    <title>Lista de Exercícios</title>

    <style>
        * {
            font-family: 'Afacad Flux', sans-serif;
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        body {
            min-height: 100dvh;
            background: linear-gradient(15deg, rgba(173, 189, 255, 1) 0%, rgba(209, 194, 255, 1) 2%, rgba(255, 255, 255, 1) 30%);
            background-size: cover;
            background-repeat: no-repeat;
        }
        /* Classe utilizada na resolução dos exercícios */
        .erro { color: red; font-weight: bold; }
    </style>
</head>

<body>
    <nav class="inline-flex justify-center md:justify-start md:px-32 w-screen bg-white shadow-md text-base shadow-sm">
        <ul class="inline-flex items-center gap-8">
            <li>
                <a href="<?php echo BASE_URL; ?>index.php"
                    class="<?= $base_link_class . ' ' . ($current_page === 'index.php' ? $active_classes : $inactive_classes); ?>">Início</a>
            </li>
            <li>
                <el-dropdown class="inline-block">
                    <button
                        class="inline-flex w-full justify-center gap-x-1 bg-white px-4 py-4 text-base font-normal cursor-pointer text-gray-400 border-b-2 border-transparent hover:border-gray-300 hover:text-gray-600">
                        Exercícios
                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                            class="-mr-1 size-5">
                            <path
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" fill-rule="evenodd" />
                        </svg>
                    </button>

                    <el-menu anchor="bottom end" popover
                        class="w-56 origin-top-right rounded-md bg-white shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                        <div class="py-1">
                            <a href="<?php echo BASE_URL; ?>/exercicios/exercicio_01.php"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-600 focus:outline-hidden">Exercício
                                1</a>
                            <a href="<?php echo BASE_URL; ?>/exercicios/exercicio_02.php"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-600 focus:outline-hidden">Exercício
                                2</a>
                            <a href="<?php echo BASE_URL; ?>/exercicios/exercicio_03.php"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-600 focus:outline-hidden">Exercício
                                3</a>
                            <a href="<?php echo BASE_URL; ?>/exercicios/exercicio_04.php"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-600 focus:outline-hidden">Exercício
                                4</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-600 focus:outline-hidden">Exercício
                                5</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-600 focus:outline-hidden">Exercício
                                6</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-600 focus:outline-hidden">Exercício
                                7</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-600 focus:outline-hidden">Exercício
                                8</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-600 focus:outline-hidden">Exercício
                                9</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:text-gray-600 focus:outline-hidden">Exercício
                                10</a>
                        </div>
                    </el-menu>
                </el-dropdown>
            </li>
            <li>
                <a href="./sobre.php"
                    class="<?= $base_link_class . ' ' . ($current_page === 'sobre.php' ? $active_classes : $inactive_classes); ?>">Sobre
                    a atividade</a>
            </li>
        </ul>
    </nav>