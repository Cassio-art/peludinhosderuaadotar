<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Excluir o animal do banco de dados
    $sql = "DELETE FROM animais WHERE id = $id";
    if ($conn->query($sql)) {
        echo "<script>
                alert('Parabéns! Você adotou um animal! 🐾 Cuide bem dele!');
                window.location.href = 'adocao.php';
              </script>";
    } else {
        echo "Erro ao adotar animal: " . $conn->error;
    }
}
?>
