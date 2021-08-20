<?php
include_once 'db_connect.php'; 
if(isset($_POST['enviar'])) {
    $username = filter($_POST['username']);
    $email = filter($_POST['email']);
    $senha = filter($_POST['senha']);
    if(empty($username) || empty($email) || empty($senha)) {
        echo "Preencha todos os Campos";
    }else {
        $senha = md5($senha);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo "Email Inválido";
        }else {
            $sql = "INSERT INTO usuarios(username, email, senha) VALUES('$username','$email','$senha')";
            mysqli_query($conn,$sql);
            if(mysqli_affected_rows($conn) > 0) {
                echo "Cadastrado com Sucesso";
            }else {
                echo "Erro ao Cadastrar";
            }
        }
    }
}
if(isset($_POST['btn-account'])) {
    header("Location: index.php");
}
function filter($input) {
    global $conn;
    $data = trim($input);
    $data = stripslashes($data);
    $data = mysqli_escape_string($conn,$data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrawRadius - Cadastrar</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="username">
        <input type="text" name="email">
        <input type="password" name="senha">
        <button type="submit" name="enviar">Criar</button>
        <button name="btn-account">Cancelar</button>
    </form>
</body>
</html>