<?php
include_once 'db_connect.php'; 
if(isset($_POST['enviar'])) {
    $username = filter($_POST['username']);
    $email = filter($_POST['email']);
    $senha = filter($_POST['senha']);
    if(empty($username) || empty($email) || empty($senha)) {
      $erros = "<p style='color: red'>Preencha todos os Campos</p>";
    }else {
        $senha = md5($senha);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
          $erros = "<p style='color: red'>Email Inválido</p>";;
        }else {
            $sql = "INSERT INTO usuarios(username, email, senha) VALUES('$username','$email','$senha')";
            mysqli_query($conn,$sql);
            if(mysqli_affected_rows($conn) > 0) {
              $erros = "<p style='background: green; text-align: center;'>Cadastrado com Sucesso</p>";;
            }else {
             $erros = "<p style='color: red'>Erro desconhecido: Falha ao Cadastrar</p>";
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
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>DrawRadius - Cadastrar</title>
</head>
<body style="height: 600px;" class="flex flex-wrap justify-center flex items-center">
<div class="w-full max-w-xs ">
  <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <?php echo !empty($erros)? $erros : ''?>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Username
      </label>
      <input name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        Email
      </label>
      <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input class="shadow appearance-none border border-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="***********" name="senha">
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="enviar">
        Criar
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="index.php">
        Fazer Login
      </a>
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2020 Acme Corp. All rights reserved.
  </p>
</div>
</body>
</html>