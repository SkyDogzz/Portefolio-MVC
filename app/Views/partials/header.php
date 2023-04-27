<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>Portfolio de Thomas Stephan</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="/public/images/user.png" alt="Photo Thomas Stephan">
            <p>Thomas Stephan</p>
        </div>
        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/about">A propos</a></li>
                <li><a href="/project">Projets</a></li>
                <li><a href="/contact">Contact</a></li>
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) { ?>
                    <li><a href="/admin/logout">Déconnexion</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <div class="content">