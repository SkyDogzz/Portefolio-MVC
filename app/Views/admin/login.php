<h1>Connexion</h1>

<?php if ($errorMessage): ?>
    <p class="error-message"><?= $errorMessage ?></p>
<?php endif; ?>

<form method="post">
    <div>
        <label for="email">Adresse e-mail</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
    </div>

    <button type="submit">Se connecter</button>
</form>
