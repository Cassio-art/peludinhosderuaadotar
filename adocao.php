<?php

$msg = '';
if (isset($_GET['msg']) && $_GET['msg'] === 'sucesso') {
    $msg = "🎉 Parabéns pela iniciativa de adoção! Seu novo amigo está esperando por você.<br>
            Para combinar a retirada, entre em contato pelo e-mail <strong>peludinhosderua@gmail.com</strong> 
            ou pelo Instagram <strong>@peludinhos_de_rua</strong>.";
}

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['imagem'])) {
    $id = $_POST['id'];
    $imagem = $_POST['imagem'];

    // Exclui o registro do banco
    $stmt = $conn->prepare("DELETE FROM animais WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Exclui a imagem da pasta
    if (file_exists($imagem)) {
        unlink($imagem);
    }

    header("Location: adocao.php?msg=sucesso");
    exit;
}

$resultado = $conn->query("SELECT * FROM animais");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Animais para Adoção</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* ... (estilos anteriores mantidos) ... */
        
        body {
            background-color: #ffe6f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #d63384;
            font-family: 'Pacifico', cursive;
            font-size: 48px;
            margin-top: 40px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .subtitulo {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            text-align: center;
            color: #555;
            margin-bottom: 40px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 300px;
            padding: 15px;
            text-align: center;
        }

        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            color: #ff4081;
        }

        .btn-adotar {
            margin-top: 10px;
            background-color: #ff4081;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-adotar:hover {
            background-color: #e73370;
        }

        .btn-voltar {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #ff4081;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
            transition: background-color 0.3s ease;
        }

        .btn-voltar:hover {
            background-color: #e73370;
        }

        /* Estilo para a mensagem de sucesso com botão */
        #msg-sucesso {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 20px 30px;
            margin: 20px auto;
            max-width: 700px;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
            font-size: 1.1em;
            line-height: 1.4;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
        }

        #msg-sucesso button {
            margin-top: 15px;
            background-color: #155724;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #msg-sucesso button:hover {
            background-color: #0f3d17;
        }
    </style>
</head>
<body>

<a href="inicio.php">
    <button class="btn-voltar">Voltar ao Início</button>
</a>

<h1>🐾 Peludinhos de Rua 🐾</h1>
<p class="subtitulo">Conheça os animaizinhos incríveis que estão em busca de um lar cheio de amor! <br>
Este é o nosso portfólio de estrelinhas que só querem carinho, cuidados... e um cantinho no seu coração. ❤️</p>

<?php if ($msg): ?>
    <div id="msg-sucesso">
        <?= $msg ?>
        <br>
        <button onclick="document.getElementById('msg-sucesso').style.display='none'">OK</button>
    </div>
<?php endif; ?>

<div class="container">
    <?php while($animal = $resultado->fetch_assoc()): ?>
        <div class="card">
            <img src="<?php echo $animal['imagem']; ?>" alt="Foto de <?php echo htmlspecialchars($animal['nome']); ?>">
            <h3><?php echo htmlspecialchars($animal['nome']); ?></h3>
            <p><strong>Idade:</strong> <?php echo htmlspecialchars($animal['idade']); ?> anos</p>
            <p><?php echo htmlspecialchars($animal['descricao']); ?></p>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $animal['id']; ?>">
                <input type="hidden" name="imagem" value="<?php echo $animal['imagem']; ?>">
                <button class="btn-adotar" type="submit">Adotar</button>
            </form>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>
