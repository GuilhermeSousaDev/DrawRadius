<?php
include_once 'db_connect.php'; 
if(isset($_POST['enviar'])) {
    $username = filter($_POST['username']);
    $email = filter($_POST['email']);
    $senha = filter($_POST['senha']);
    $sql = "SELECT username FROM usuarios WHERE username = '$username'";
    $query = mysqli_query($conn,$sql);
    if(empty($username) || empty($email) || empty($senha)) {
      $erros = "<p style='color: red'>Preencha todos os Campos</p>";
    }else{
    if(mysqli_num_rows($query) > 0) {
        $senha = md5($senha);
        $sql = "SELECT * FROM usuarios WHERE username = '$username' AND email = '$email' AND senha = '$senha'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_array($query);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['logado'] = true;
            header("Location: home.php");
        }else {
          $erros = "<p style='color: red'>Email ou Senha incorretos</p>";
        }
    }else {
        $erros = "<p style='color: red'>Usuário não existe</p>";
    }
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
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>DrawRadius - Login</title>
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
        Sign In
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="cadastrar.php">
        Criar Conta
      </a>
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2020 Acme Corp. All rights reserved.
  </p>
</div>
</body>
</html>