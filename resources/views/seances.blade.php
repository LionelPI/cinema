
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Séances - Cinema</title>

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

        .seances-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .seance-card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .seance-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.10);
        }

        .film-title {
            color: #172554;
            font-size: 21px;
            margin-bottom: 18px;
        }

        .seance-info {
            margin-bottom: 12px;
            font-size: 15px;
            color: #475569;
        }

        .seance-info strong {
            color: #1e293b;
        }

        .horaire {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 9px 15px;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 12px;
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
        <h2>Nos séances</h2>
        <p>Consultez les prochaines projections de notre cinéma.</p>
    </section>

    @if($seances->isEmpty())

        <div class="empty-message">
            <h3>Aucune séance disponible</h3>
            <p>Les prochaines séances seront affichées ici.</p>
        </div>

    @else

        <div class="seances-grid">

            @foreach($seances as $seance)

                <article class="seance-card">

                    <h3 class="film-title">
                        {{ $seance->film->titre ?? 'Film indisponible' }}
                    </h3>

                    <p class="seance-info">
                        <strong>Genre :</strong>
                        {{ $seance->film->genre ?? 'Non renseigné' }}
                    </p>

                    <p class="seance-info">
                        <strong>Durée :</strong>
                        {{ $seance->film->duree ?? 'Non renseignée' }} minutes
                    </p>

                    <p class="seance-info">
                        <strong>Date :</strong>
                        {{ \Carbon\Carbon::parse($seance->date)->format('d.m.Y') }}
                    </p>

                    <p class="seance-info">
                        <strong>Salle :</strong>
                        {{ $seance->salle->nom ?? 'Salle indisponible' }}
                    </p>

                    <p class="seance-info">
                        <strong>Capacité :</strong>
                        {{ $seance->salle->capacite ?? 'Non renseignée' }} places
                    </p>

                    <div class="horaire">
                        {{ \Carbon\Carbon::parse($seance->heure)->format('H:i') }}
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
