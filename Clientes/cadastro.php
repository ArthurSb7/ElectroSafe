<?php


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - ElectroSafe</title>
</head>
<body>
    <div>
        <h2> Cadastro </h2>
        <div>
            <form action="processaCadastro.php" method="POST">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome"placeholders="Insira seu nome completo"required>
                <br>
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" placeholders="email@gmail.com"required>
                <br>
                <label for="data_nascimento">Data de nascimento: </label>
                <input type="date" name="data de nascimento"id="data_nascimento" placeholders="dd/mm/aaaa"required>
                <br>
                <label for="senha">Senha: </label>
                <input type="password" name="Senha" id="senha" required>
                <br>
                <label for="senha_confirmada">Confirme a senha: </label>
                <input type="password" name="senha_confirmada"id="senha"required>

                <?php if($_POST["Senha"] == $_POST["senha_confirmada"]){ 
                    echo "Senha correta";

                }else {echo "As senhas não correspondem";}?>

                
            </form>
        </div>
    </div>
</body>
</html>