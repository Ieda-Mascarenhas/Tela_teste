<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
   die("Você não está logado, para acessar essa página você precisa estar logado. <p><a href=\"login.php\">Clique aqui para fazer login</a></p>");
}

?>