
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nos films - Cinema</title>

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
            padding: 35px 8%;
        }

        .films {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-top: 25px;
        }

        .film {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #00000010;
        }

        .film h2 {
            color: #172554;
            margin-top: 0;
        }

        .genre {
            color: #2563eb;
            font-weight: bold;
        }

        .description {
            line-height: 1.6;
        }

        .date {
            color: #666;
            font-size: 14px;
        }

        .retour {
            display: inline-block;
            margin-top: 20px;
            background: #2563eb;
            color: white;
            padding: 12px 18px;
            border-radius: 6px;
            text-decoration: none;
        }

        footer {
            text-align: center;
            padding: 25px;
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
    <h2>Nos films</h2>

    <p>Découvrez les films disponibles dans notre cinéma.</p>

    <div class="films">

        @forelse ($films as $film)

            <article class="film">

                <h2>{{ $film->titre }}</h2>

                <p class="genre">
                    {{ $film->genre }}
                </p>

                <p>
                    <strong>Durée :</strong>
                    {{ $film->duree }} minutes
                </p>

                <p class="description">
                    {{ $film->description ?? 'Aucune description disponible.' }}
                </p>

                @if ($film->date_sortie)
                    <p class="date">
                        Date de sortie :
                        {{ $film->date_sortie }}
                    </p>
                @endif

            </article>

        @empty

            <p>Aucun film disponible pour le moment.</p>

        @endforelse

    </div>

    <a class="retour" href="/">Retour à l'accueil</a>
</main>

<footer>
    Projet Cinema — PoC Laravel
</footer>

</body>
</html>
