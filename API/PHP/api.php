<?php

// Inclua o arquivo de configuração
require_once 'config.php';

// Conecte-se ao banco de dados (se necessário)
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Execute uma consulta no banco de dados
$sql = "SELECT * FROM sua_tabela";
$result = $conn->query($sql);

// Verifique se há resultados
if ($result->num_rows > 0) {
    // Array para armazenar os dados
    $data = array();

    // Percorra os resultados
    while ($row = $result->fetch_assoc()) {
        // Adicione os dados ao array
        $data[] = $row;
    }

    // Converta os dados para JSON
    $json = json_encode($data);

    // Retorne os dados para o Power BI
    echo $json;
} else {
    echo "Nenhum resultado encontrado.";
}

// Feche a conexão com o banco de dados
$conn->close();

?>
