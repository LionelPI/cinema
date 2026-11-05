
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema - Accueil</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f5f7;
            color: #222;
        }

        header {
            background: #172554;
            color: white;
            padding: 24px 8%;
        }

        header h1 {
            margin: 0;
        }

        nav {
            margin-top: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        main {
            padding: 50px 8%;
        }

        .hero {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #00000010;
        }

        .hero h2 {
            color: #172554;
        }

        .button {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 12px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #666;
        }
    </style>
</head>

<body>
<header>
    <h1>🎬 Cinema</h1>

    <nav>
        <a href="/">Accueil</a>
        <a href="/films">Films</a>
        <a href="/seances">Séances</a>
        <a href="/salles">Salles</a>
           </nav>
</header>

<main>
    <section class="hero">
        <h2>Bienvenue dans notre cinéma</h2>

        <p>
            Découvrez les films à l'affiche, consultez les séances
            et explorez nos salles de cinéma.
        </p>

        <a class="button" href="/films">
            Découvrir les films
        </a>
    </section>
</main>

<footer>
    Projet Cinema — PoC Laravel
</footer>
</body>
</html>
