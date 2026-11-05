
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salles - Cinema</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #1f2937;
        }

        header {
            background: #172554;
            color: white;
            padding: 30px 8%;
        }

        header h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        nav {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 17px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            max-width: 1200px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .page-title {
            margin-bottom: 30px;
        }

        .page-title h2 {
            font-size: 28px;
            color: #172554;
            margin-bottom: 10px;
        }

        .page-title p {
            color: #64748b;
            font-size: 16px;
        }

        .salles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .salle-card {
            background: white;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .salle-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.10);
        }

        .salle-icon {
            font-size: 35px;
            margin-bottom: 15px;
        }

        .salle-card h3 {
            color: #172554;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .salle-info {
            margin-bottom: 14px;
            color: #475569;
            font-size: 15px;
            line-height: 1.5;
        }

        .salle-info strong {
            color: #1e293b;
        }

        .capacite {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 8px;
        }

        .empty-message {
            background: white;
            padding: 35px;
            text-align: center;
            border-radius: 12px;
            color: #64748b;
        }

        footer {
            text-align: center;
            padding: 30px;
            color: #64748b;
            margin-top: 50px;
        }

        @media (max-width: 600px) {
            header {
                padding: 25px 20px;
            }

            header h1 {
                font-size: 27px;
            }

            nav {
                gap: 18px;
            }

            main {
                margin-top: 30px;
            }
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

    <section class="page-title">
        <h2>Nos salles de cinéma</h2>
        <p>Découvrez nos espaces de projection et leurs équipements.</p>
    </section>

    @if($salles->isEmpty())

        <div class="empty-message">
            <h3>Aucune salle disponible</h3>
            <p>Les salles seront affichées ici.</p>
        </div>

    @else

        <div class="salles-grid">

            @foreach($salles as $salle)

                <article class="salle-card">

                    <div class="salle-icon">🎥</div>

                    <h3>{{ $salle->nom }}</h3>

                    <p class="salle-info">
                        <strong>Capacité :</strong>
                        {{ $salle->capacite }} places
                    </p>

                    <p class="salle-info">
                        <strong>Équipements :</strong><br>
                        {{ $salle->equipements ?: 'Non renseignés' }}
                    </p>

                    <div class="capacite">
                        {{ $salle->capacite }} places
                    </div>

                </article>

            @endforeach

        </div>

    @endif

</main>

<footer>
    Projet Cinema — PoC Laravel
</footer>

</body>
</html>
