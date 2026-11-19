 <?php

    // require_once __DIR__ . "/init.php";

    // $emailInserido = '';
    // $senhaInserida = '';
    // $params = '';
    // $hash = '';


    // if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //     $emailInserido = $_POST['email'];
    //     $senhaInserida = $_POST['senha'];

    //     if ( $emailInserido == readAll($pdo, 'usuarios', $params['email']) ){
            
    //         if($senhaInserida, password_verify(readAll($pdo, 'usuarios', $params['senha'])){
    //             header('Location: index.php');
    //             exit;}
    //     }else {
    //         echo "Tente novamente, E-mail ou Senha incorretos.";
    //     }
    // }

        

?> 

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ElectroSafe</title>
    <link rel="stylesheet" href="stylesClientes/styleLogin.css">
</head>
<body >
    <div class="Formulario">
        <img src="imagens/logo.png" alt="Logo-ElectroSafe">
        <h2>Login</h2>

        <form action="" method="POST">

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email"
            placeholder="email@gmail.com" required>
            
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <button type="submit">Cadastrar</button>

            <p>Não possui login? <a href="cadastro.php">Clique aqui</a> para fazer seu cadastro! </p>
    </div>
</body>
</html>