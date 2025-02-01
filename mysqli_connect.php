<?php
$servername = "localhost";
$username = "seu_usuario_mysql";
$password = "sua_senha_mysql";
$dbname = "archivematica_integration";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado com sucesso"; 
}
catch(PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}
?>

<?php
$sql = "INSERT INTO documents (file_name, file_path) VALUES ('documento1.txt', '/caminho/para/documento1')";
if (mysqli_query($conn, $sql)) {
    echo "Novo documento inserido com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
}
?>

<?php
$sql = "SELECT id, file_name, uploaded_at FROM documents";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. " - Nome do Arquivo: " . $row["file_name"]. " - Data de Upload: " . $row["uploaded_at"]. "<br>";
    }
} else {
    echo "0 resultados";
}
?>
