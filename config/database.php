<?php

if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}
if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'root');
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', 'proyect_lok');
}
if (!defined('DB_PORT')) {
    define('DB_PORT', 3306);
}


$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if ($db->connect_errno) {
    die("Error de conexión a la base de datos: (" . $db->connect_error . ")");
}

if (!$db->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $db->error);
    exit();
}
