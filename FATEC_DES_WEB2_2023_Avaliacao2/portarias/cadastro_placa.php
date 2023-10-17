<?php
// Inclui os arquivos 'header.php' e 'dados_banco.php' no script
require_once('header.php');
require_once('dados_banco.php');

// Obtém os valores dos campos 'aluno' e 'placa' do formulário enviado via POST
$aluno = $_GET['aluno'];
$placa = $_GET['placa'];

// Verifica se o comprimento do valor de 'aluno' é maior que 10 caracteres
if (strlen($aluno) > 10) {
    // Se 'aluno' tiver mais de 10 caracteres, redireciona o usuário para 'cadastro.php'
    header("location: cadastro.php");
}

try {
    // Define a string de conexão DSN para o MySQL com informações de servidor, nome do banco de dados, nome de usuário e senha
    $dsn = "mysql:host=$servername;dbname=$dbname";

    // Cria uma nova instância do PDO (PHP Data Objects) para estabelecer uma conexão com o banco de dados
    $conn = new PDO($dsn, $username, $password);

    // Define o modo de erro do PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Constrói a consulta SQL para inserir os valores de 'aluno' e 'placa' na tabela 'veiculos'
    $sql = "INSERT INTO veiculos (aluno, placa) VALUES ('$aluno', '$placa')";
} catch (PDOException $e) {
    // Em caso de exceção (erro), exibe a consulta SQL que causou o erro e a mensagem de erro
    echo $sql . "<br>" . $e->getMessage();
}

// Executa a consulta SQL e armazena o resultado em $stmt (um objeto de consulta)
$stmt = $conn->query($sql);

// Fecha a conexão com o banco de dados
$conn = NULL;
?>

 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Portaria Fatec</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>
            <?php echo $_SESSION["username"]; ?>
            <br>
        </h1>
    </div>
    <p>
    Aluno: <b>
        <?php echo $aluno; ?>
    </b>cadastrado com sucesso.
    <br><br>
        <a href="principal.php" class="btn btn-primary">Voltar</a>
    <br><br>
    </p>
</body>
</html>