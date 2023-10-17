<?php
// Inclui os arquivos 'header.php' e 'dados_banco.php' no script
require_once('header.php');
require_once('dados_banco.php');

try {
    // Define a string de conexão DSN para o MySQL com informações de servidor, nome do banco de dados, nome de usuário e senha
    $dsn = "mysql:host=$servername;dbname=$dbname";
    
    // Cria uma nova instância do PDO (PHP Data Objects) para estabelecer uma conexão com o banco de dados
    $conn = new PDO($dsn, $username, $password);
    
    // Define o modo de erro do PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Obtém o valor do parâmetro 'placa_id' da consulta GET e o armazena na variável $placa
    $placa = $_GET['placa_id'];
    
    // Constrói a consulta SQL para selecionar a coluna 'data_hora' da tabela 'registro' com base em uma junção (JOIN) com a tabela 'veiculos'
    // A consulta filtra os registros onde 'veiculos_id' na tabela 'registro' é igual a 'id' na tabela 'veiculos', com base no valor de 'placa'
    $sql = "SELECT r.data_hora FROM veiculos v INNER JOIN registro r WHERE r.veiculos_id = v.id AND v.id = '$placa'";
} catch (PDOException $e) {
    // Em caso de exceção (erro), exibe a consulta SQL que causou o erro e a mensagem de erro
    echo $sql . "<br>" . $e->getMessage();
}

// Executa a consulta SQL e armazena o resultado em $stmt (um objeto de consulta)
$stmt = $conn->query($sql);
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
        <h2>
            <?php echo $_SESSION["username"]; ?>
            <br>
        </h2>
    </div>
    <p>

        <div class="form-group">
            <label>Data e Hora em que existe registro de entrada/saída</label>
            <br>
            <?php
            while ($row = $stmt->fetch()) {
                echo $row['data_hora'] . " / ";
               }
           $conn = NULL;
            ?>
        </div>


    <a href="principal.php" class="btn btn-primary">Voltar</a>
    <br><br>

    </p>
</body>
</html>