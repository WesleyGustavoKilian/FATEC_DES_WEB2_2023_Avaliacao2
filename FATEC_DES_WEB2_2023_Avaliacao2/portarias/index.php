<?php
// Verificar se a requisição HTTP é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start(); // Inicializar a sessão PHP

    // Verificar se o valor do campo 'nome' é igual a 'fatec' e o valor do campo 'senha' é igual a 'portaria'
    if ($_POST['nome'] == 'fatec' and $_POST['senha'] == 'portaria') {
        // Se as credenciais forem válidas, definir a variável de sessão 'online' como TRUE
        $_SESSION['online'] = TRUE;
        $_SESSION['username'] = "Portaria Fatec";

        // Redirecionar o usuário para a página 'principal.php' (presumivelmente, a página após o login bem-sucedido)
        header("location: principal.php"); // Redireciona para o Principal.php (NOME DA PASTA)
        
    } else {
        // Se as credenciais não forem válidas, definir a variável de sessão 'online' como FALSE
        $_SESSION['online'] = FALSE;
        
        // Exibir mensagem de erro
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>

 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Acessar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Acessar</h2>
        <p>Favor inserir login e senha.</p>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="fatec">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" value="portaria">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Acessar">
            </div>
        </form>
    </div>    
</body>
</html>