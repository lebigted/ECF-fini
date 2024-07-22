<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'php/db_config.php';

$error = '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Professionnelle</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            background-image: url('https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExdmxodWNsMWV3MjRvY3d4bnVwZ3d5bXJjam1hdDh5YWw2cnd2dXY1cyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/cM6zLTGgrJqOQ/giphy.gif');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
            transition: transform 0.3s ease, filter 0.3s ease;
        }
        .btn-toggle {
            width: 100%;
            margin-bottom: 1rem;
            transition: background-color 0.3s ease;
        }
        .btn-toggle:hover {
            background-color: #0056b3;
        }
        .message {
            text-align: center;
            margin-bottom: 1rem;
        }
        .message p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            <?php if ($error): ?>
                <p class="text-danger"><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
        
        <div>
            <button class="btn btn-primary btn-toggle" onclick="location.href='content/login.php'">Je m'enregistre</button>
        </div>
    </div>
</body>
</html>
