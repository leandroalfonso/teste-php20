<?php
// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo "nome_aluno" está definido e não está vazio
    if (isset($_POST["nome_aluno"]) && !empty($_POST["nome_aluno"])) {
        // Recupera o nome do aluno do formulário
        $nome_aluno = $_POST["nome_aluno"];

        // Verifica se o campo "id_curso" está definido e não está vazio
        if (isset($_POST["id_curso"]) && !empty($_POST["id_curso"])) {
            // Recupera o id do curso do formulário
            $id_curso = $_POST["id_curso"];

            // Conexão com o banco de dados
            $conn = mysqli_connect('localhost', 'root', '', 'alunos_db');

            // Verifica se a conexão foi estabelecida com sucesso
            if ($conn) {
                // Prepara a consulta SQL para inserir o aluno no banco de dados
                $sql = "INSERT INTO alunos (nome_aluno, id_curso) VALUES ('$nome_aluno', '$id_curso')";

                // Executa a consulta SQL
                if (mysqli_query($conn, $sql)) {
                    // Redireciona o usuário de volta para index.html
                    header("Location: index.html");
                    exit; // Termina a execução do script após redirecionar
                } else {
                    echo "Erro ao inserir aluno: " . mysqli_error($conn);
                }

                // Fecha a conexão com o banco de dados
                mysqli_close($conn);
            } else {
                echo "Erro na conexão com o banco de dados";
            }
        } else {
            echo "ID do curso não foi enviado no formulário";
        }
    } else {
        echo "Nome do aluno não foi enviado no formulário";
    }
}

