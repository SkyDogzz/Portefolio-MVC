</div>
</body>

</html>

<?php $debug = false; ?>

<footer>
    <h2>Me contacter</h2>
    <form action="/contact" method="post">
        <div class="input-container">
            <input class="normal" type="text" id="name" name="name" placeholder="Nom"required>
        </div>

        <div class="input-container">
            <input class="normal" type="email" id="email" name="email" placeholder="Addresse email"required>
        </div>

        <div class="input-container">
            <input class="normal" type="text" id="subject" name="subject" placeholder="Objet" required>
        </div>

        <div class="input-container">
            <textarea id="message" name="message" required rows="8" placeholder="Message"></textarea>
        </div>

        <button type="submit">Envoyer</button>
    </form>
    <?php if (isset($debug) && $debug == true) {
    ?>
        <h1>DEBUG</h1>
        <div>
            <pre><h2>$_POST</h2><?php var_dump($_POST); ?></pre>
            <pre><h2>$_GET</h2><?php var_dump($_GET); ?></pre>
            <pre><h2>$_SESSION</h2><?php var_dump($_SESSION); ?></pre>
            <pre><h2>$_SERVER</h2><?php var_dump($_SERVER); ?></pre>
        </div>
        <style>
            footer>h1 {
                text-align: center;
            }

            footer>div {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
            }

            pre {
                margin: 10px;
                padding: 10px;
                border: 1px solid black;
                border-radius: 5px;
            }
        </style>
    <?php
    }
    ?>
</footer>