<a href="inicio.php" class="btn-voltar">← Voltar ao Início</a>

<?php
include 'conexao.php';

$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $descricao = $_POST['descricao'];

    $imagem = $_FILES['imagem']['name'];
    $caminhoImagem = 'imagens/' . basename($imagem);

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem)) {
        $stmt = $conn->prepare("INSERT INTO animais (nome, idade, descricao, imagem) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $nome, $idade, $descricao, $caminhoImagem);

        if ($stmt->execute()) {
            $mensagem = "<p class='sucesso'>Animal cadastrado com sucesso! 🐾</p>";
        } else {
            $mensagem = "<p class='erro'>Erro ao cadastrar: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        $mensagem = "<p class='erro'>Erro ao enviar imagem.</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro de Animais - Peludinhos de Rua</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&family=Pacifico&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #ffe6f0, #ffd1dc);
            font-family: 'Quicksand', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
            position: relative;
            overflow: hidden;
        }

        .btn-voltar {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #ff4081;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
            transition: background-color 0.3s ease;
            font-size: 1em;
        }

        .btn-voltar:hover {
            background-color: #e0317d;
        }

        h1 {
            font-family: 'Pacifico', cursive;
            color: #d63384;
            font-size: 2.8em;
            margin-bottom: 25px;
            text-align: center;
            text-shadow: 1px 1px 2px #c06298;
        }

        form {
            background: white;
            padding: 30px 35px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(214,51,132,0.3);
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 2;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1.5px solid #d63384;
            font-size: 1em;
            resize: vertical;
            font-family: 'Quicksand', sans-serif;
            width: 100%;
        }

        textarea {
            min-height: 80px;
        }

        button[type="submit"] {
            background-color: #ff66b2;
            color: white;
            border: none;
            padding: 15px 0;
            font-size: 1.2em;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 5px 10px rgba(255, 102, 178, 0.4);
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #e04a91;
        }

        .sucesso {
            color: #2d9a4f;
            font-weight: 600;
            margin-bottom: 15px;
            text-align: center;
        }

        .erro {
            color: #cc3c3c;
            font-weight: 600;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Padrões decorativos */
        .paw-background {
            position: absolute;
            width: 100px;
            opacity: 0.05;
            animation: float 6s ease-in-out infinite;
        }

        .paw1 {
            top: 40px;
            left: 40px;
        }

        .paw2 {
            bottom: 30px;
            right: 30px;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0); }
        }

        @media(max-width: 480px) {
            body {
                padding: 20px 10px;
            }

            form {
                padding: 20px;
                box-shadow: 0 0 10px rgba(214,51,132,0.2);
            }

            h1 {
                font-size: 2em;
            }

            .btn-voltar {
                font-size: 0.9em;
                padding: 8px 14px;
                top: 15px;
                left: 15px;
            }
        }
    </style>
</head>
<body>

    <!-- Imagens decorativas -->
    <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="paw-background paw1" alt="pata" />
    <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="paw-background paw2" alt="pata" />

    <h1>Cadastro de Animais para Adoção</h1>

    <?php echo $mensagem; ?>

    <form method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="text" name="nome" placeholder="Nome do animal" required />
        <input type="number" name="idade" placeholder="Idade do animal (em anos)" min="0" required />
        <textarea name="descricao" placeholder="Descrição" required></textarea>
        <input type="file" name="imagem" accept="image/*" required />
        <button type="submit">Cadastrar Animal</button>
    </form>

</body>
</html>
