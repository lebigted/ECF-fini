<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../php/db_config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if ($username && $password) {
            try {
                $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
                $stmt->execute(['username' => $username]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    header('Location: ../index.php');
                    exit;
                } else {
                    $error = 'Nom d\'utilisateur ou mot de passe incorrect.';
                }
            } catch (PDOException $e) {
                $error = 'Erreur : ' . $e->getMessage();
            }
        } else {
            $error = 'Veuillez entrer le nom d\'utilisateur et le mot de passe.';
        }
    } elseif (isset($_POST['register'])) {
        $username = isset($_POST['reg_username']) ? $_POST['reg_username'] : '';
        $password = isset($_POST['reg_password']) ? $_POST['reg_password'] : '';
        $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

        if ($username && $password && $confirm_password) {
            if ($password === $confirm_password) {
                try {
                    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
                    $stmt->execute(['username' => $username]);
                    $user = $stmt->fetch();

                    if ($user) {
                        $error = 'Nom d\'utilisateur déjà pris.';
                    } else {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');
                        $stmt->execute(['username' => $username, 'password' => $hashed_password, 'role' => 'user']);
                        $success = 'Inscription réussie. Vous pouvez maintenant vous connecter.';
                    }
                } catch (PDOException $e) {
                    $error = 'Erreur : ' . $e->getMessage();
                }
            } else {
                $error = 'Les mots de passe ne correspondent pas.';
            }
        } else {
            $error = 'Veuillez remplir tous les champs.';
        }
    } elseif (isset($_POST['pro_login'])) {
        $pro_username = isset($_POST['pro_username']) ? $_POST['pro_username'] : '';
        $pro_password = isset($_POST['pro_password']) ? $_POST['pro_password'] : '';

        if ($pro_username && $pro_password) {
            try {
                $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
                $stmt->execute(['username' => $pro_username]);
                $pro_user = $stmt->fetch();

                if ($pro_user && password_verify($pro_password, $pro_user['password'])) {
                    $_SESSION['user_id'] = $pro_user['id'];
                    $_SESSION['username'] = $pro_user['username'];
                    $_SESSION['role'] = $pro_user['role'];
                    
                    if (in_array($pro_user['role'], ['admin', 'vet', 'employee'])) {
                        header('Location: espace_pro.php');
                    } else {
                        $error = 'Accès refusé. Vous n\'êtes pas autorisé à accéder à cet espace.';
                    }
                    exit;
                } else {
                    $error = 'Nom d\'utilisateur ou mot de passe incorrect pour l\'espace professionnel.';
                }
            } catch (PDOException $e) {
                $error = 'Erreur : ' . $e->getMessage();
            }
        } else {
            $error = 'Veuillez entrer le nom d\'utilisateur et le mot de passe pour l\'espace professionnel.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login et Inscription</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
        .form-container {
            display: none;
        }
        .form-container.active {
            display: block;
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
        .blur {
            filter: blur(8px);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container" id="main-container">
        <div class="message">
            <?php if ($error): ?>
                <p class="text-danger"><?php echo $error; ?></p>
            <?php endif; ?>
            <?php if ($success): ?>
                <p class="text-success"><?php echo $success; ?></p>
            <?php endif; ?>
        </div>
        
        <div>
            <button class="btn btn-primary btn-toggle" onclick="toggleForm('login-form')">Connexion</button>
            <button class="btn btn-secondary btn-toggle" onclick="toggleForm('register-form')">Inscription</button>
            <button class="btn btn-info btn-toggle" onclick="toggleForm('pro-login-form')">Espace Pro</button>
        </div>
        
        <div id="login-form" class="form-container active">
            <h2 class="text-center">Connexion</h2>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="login">Connexion</button>
            </form>
        </div>
        
        <div id="register-form" class="form-container">
            <h2 class="text-center">Inscription</h2>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="reg_username" class="form-label">Nom d'utilisateur:</label>
                    <input type="text" class="form-control" id="reg_username" name="reg_username" required>
                </div>
                <div class="mb-3">
                    <label for="reg_password" class="form-label">Mot de passe:</label>
                    <input type="password" class="form-control" id="reg_password" name="reg_password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmez le mot de passe:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="register">Inscription</button>
            </form>
        </div>

        <div id="pro-login-form" class="form-container">
            <h2 class="text-center">Espace Pro</h2>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="pro_username" class="form-label">Nom d'utilisateur:</label>
                    <input type="text" class="form-control" id="pro_username" name="pro_username" required>
                </div>
                <div class="mb-3">
                    <label for="pro_password" class="form-label">Mot de passe:</label>
                    <input type="password" class="form-control" id="pro_password" name="pro_password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="pro_login">Connexion Pro</button>
            </form>
        </div>
    </div>
    
    <script>
        function toggleForm(formId) {
            const mainContainer = document.getElementById('main-container');
            mainContainer.classList.add('blur');
            setTimeout(() => {
                document.getElementById('login-form').classList.remove('active');
                document.getElementById('register-form').classList.remove('active');
                document.getElementById('pro-login-form').classList.remove('active');
                document.getElementById(formId).classList.add('active');
                mainContainer.classList.remove('blur');
            }, 300);
        }
    </script>
</body>
</html>

