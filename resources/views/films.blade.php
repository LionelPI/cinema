<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films - Cinema</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f5f7;
            color: #202938;
        }

        header {
            background: #192953;
            color: white;
            padding: 25px 4%;
        }

        header h1 {
            font-size: 36px;
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
            max-width: 1250px;
            margin: 60px auto;
            padding: 0 25px;
        }

        h2 {
            color: #192953;
            font-size: 30px;
            margin-bottom: 12px;
        }

        .intro {
            color: #718096;
            margin-bottom: 30px;
        }

        .films {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        .film-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }

        .film-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 18px;
        }

        .film-card h3 {
            color: #192953;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .film-card p {
            margin-bottom: 12px;
            color: #526078;
            line-height: 1.5;
        }

        .message {
            color: #718096;
            margin-top: 20px;
        }

        footer {
            text-align: center;
            color: #718096;
            padding: 40px;
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

    <p class="intro">
        Découvrez les films disponibles dans notre cinéma.
    </p>

    <div id="films" class="films">
        <p class="message">Chargement des films...</p>
    </div>

</main>

<footer>
    Projet Cinema — PoC Laravel
</footer>

<script>
    // Récupérer les films depuis l'API REST
    fetch('/api/films')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur lors du chargement des films.');
            }

            return response.json();
        })
        .then(films => {
            const conteneur = document.getElementById('films');

            conteneur.innerHTML = '';

            if (films.length === 0) {
                conteneur.innerHTML = '<p class="message">Aucun film disponible.</p>';
                return;
            }

            films.forEach(film => {
                const carte = document.createElement('div');
                carte.className = 'film-card';

                // Affiche du film
                const image = document.createElement('img');
                image.src = '/images/' + film.affiche;
                image.alt = film.titre;

                const titre = document.createElement('h3');
                titre.textContent = film.titre;

                const genre = document.createElement('p');
                genre.textContent = 'Genre : ' + film.genre;

                const duree = document.createElement('p');
                duree.textContent = 'Durée : ' + film.duree + ' minutes';

                const date = document.createElement('p');
                date.textContent = 'Date de sortie : ' + (film.date_sortie || 'Non renseignée');

                const description = document.createElement('p');
                description.textContent = film.description || '';

                carte.appendChild(image);
                carte.appendChild(titre);
                carte.appendChild(genre);
                carte.appendChild(duree);
                carte.appendChild(date);
                carte.appendChild(description);

                conteneur.appendChild(carte);
            });
        })
        .catch(erreur => {
            document.getElementById('films').innerHTML =
                '<p class="message">Impossible de charger les films. Veuillez réessayer.</p>';

            console.error(erreur);
        });
</script>

</body>
</html>
