<?php
$document_root_path = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
$repo_path = str_replace($document_root_path, '', str_replace('\\', '/', __DIR__));


define('BASE_URL',  $repo_path . '/');
?>