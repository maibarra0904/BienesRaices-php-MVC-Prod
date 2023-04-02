<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'id20543030_root', 'LMip092132493@', 'id20543030_bienesraices_crud');
    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}