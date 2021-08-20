<?php
include_once 'db_connect.php'; 
if(isset($_POST['enviar'])) {
    $username = filter($_POST['username']);
    $email = filter($_POST['email']);
    $senha = filter($_POST['senha']);
    $sql = "SELECT username FROM usuarios WHERE username = '$username'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query) > 0) {
        $senha = md5($senha);
        $sql = "SELECT * FROM usuarios WHERE username = '$username' AND email = '$email' AND senha = '$senha'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_array($query);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['logado'] = true;
            header("Location: home.php");
        }
    }else {
        echo "Usuário não existe";
    }
}
if(isset($_POST['btn-account'])) {
    header("Location: cadastrar.php");
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
    <title>DrawRadius - Login</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="username">
        <input type="text" name="email">
        <input type="password" name="senha">
        <button type="submit" name="enviar">Entrar</button>
        <button name="btn-account">Criar Conta</button>
    
    </form> 
   
</body>
</html>