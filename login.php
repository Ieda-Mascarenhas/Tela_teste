<?php
include('coneccao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){
   
    if(strlen($_POST['email']) == 0) {
        echo "Preencha o campo email";
    }else if(strlen($_POST['senha']) == 0){
        echo "Preencha o campo senha";
       
       }else{

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM logados WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução da consulta: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['name'] = $usuario['name'];

            header("Location: index.php");
        } else {
            echo "Email ou senha incorretos";
        }
    }    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="css/login.css"/>
</head>
<body>
    
    <form action="" method="POST">
    <h1>Login</h1>
        <p>
            <label>Email:</label>
            <input type="text" name="email" required>
        </p>
        <p>
            <label>senha:</label>
            <input type="password" name="senha" required>
        </p>
        <p> 
            <input type="submit" value="Entrar"> 
        </p>
    



    </form>
    
</body>
</html>