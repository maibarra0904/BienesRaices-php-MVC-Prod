<?php


    use Dotenv\Dotenv as Dot;

    require __DIR__.'/../vendor/autoload.php';

    $dotenv = Dot::createImmutable(__DIR__);
    $dotenv->safeLoad();

    require 'funciones.php';
    require 'config/database.php';
    

    $db = conectarDB();

    use Model\ActiveRecord;

    ActiveRecord::setDB($db);

    
    //$propiedad = new Propiedad;

    
    //var_dump($propiedad);

?>