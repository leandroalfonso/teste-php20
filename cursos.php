<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


// Conexão com o banco de dados
$conn = mysqli_connect('localhost', 'root', '', 'alunos_db') or die("Error in connection");

$sql = "SELECT * FROM cursos";

$result = $conn->query($sql);

if($result->num_rows > 0) {
    $cursos = array();
    while($row = $result->fetch_assoc()) {
        $cursos[] = $row;
    }
    echo json_encode($cursos);
} else {
    echo json_encode(array());
}


// Fecha a conexão com o banco de dados
mysqli_close($conn);

