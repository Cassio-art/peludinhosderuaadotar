<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Início - Peludinhos de Rua</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffe6f0, #ffd6ec);
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
            z-index: 10;
        }

        .btn-voltar:hover {
            background-color: #e0317d;
        }

        h1 {
            font-family: 'Pacifico', cursive;
            font-size: 3em;
            margin-bottom: 20px;
            color:rgb(221, 6, 113);
            text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }

        p.subtitulo {
            font-size: 1.2em;
            color: #444;
            margin-bottom: 40px;
            text-align: center;
            max-width: 500px;
        }

        .main-button {
            padding: 15px 35px;
            font-size: 1.2em;
            background-color:rgb(221, 6, 113);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, background-color 0.3s;
        }

        .main-button:hover {
            background-color:rgb(221, 6, 113);
            transform: scale(1.05);
        }

        .secret-button {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 0.9em;
            background: none;
            border: none;
            color:rgb(126, 37, 78);
            text-decoration: underline;
            cursor: pointer;
        }

        .secret-button:hover {
            color: #333;
        }

        .paw-background {
            position: absolute;
            width: 100px;
            opacity: 0.05;
            animation: float 5s ease-in-out infinite;
        }

        .paw1 {
            top: 30px;
            left: 30px;
        }

        .paw2 {
            bottom: 40px;
            right: 40px;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- Botão Voltar ao Início -->
    <a href="inicio.php" class="btn-voltar">← Voltar ao Início</a>

    <!-- Padrões decorativos -->
    <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="paw-background paw1" alt="pata">
    <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="paw-background paw2" alt="pata">

    <!-- Botão secreto no canto superior direito -->
    <form action="login.php" method="get">
        <button type="submit" class="secret-button">Somente clique se for da EQUIPE!</button>
    </form>

    <!-- Título e subtítulo -->
    <h1>🐾 Peludinhos de Rua 🐾</h1>
    <p class="subtitulo">Bem-vindo ao nosso projeto de adoção! Aqui você encontra animaizinhos cheios de amor esperando por uma nova família. 🏡</p>

    <!-- Botão principal -->
    <form action="adocao.php" method="get">
        <button type="submit" class="main-button">Ver Animais para Adoção</button>
    </form>

</body>
</html>
