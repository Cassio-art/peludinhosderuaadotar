<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario === "allana2025" && $senha === "Cassiomeunamorado") {
        header("Location: cadastroanimais.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Equipe Peludinhos</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #ffd1dc, #ffe6f0);
            font-family: 'Quicksand', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        .login-box h2 {
            font-family: 'Pacifico', cursive;
            font-size: 2em;
            color: #d63384;
            margin-bottom: 15px;
        }

        .login-box p {
            font-size: 0.95em;
            color: #555;
            margin-bottom: 25px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 12px;
            margin-bottom: 15px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1em;
        }

        button {
            padding: 12px 20px;
            background-color: #ff69b4;
            color: #fff;
            font-size: 1em;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff1493;
        }

        .erro {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
        }

        .logo-pata {
            width: 50px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="logo-pata" alt="Pata">
    <h2>Login da Equipe</h2>
    <p>Área restrita para cuidadores dos Peludinhos de Rua 💼</p>

    <?php if (isset($erro)) echo "<p class='erro'>$erro</p>"; ?>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>
