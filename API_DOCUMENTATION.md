# Documentation API – Projet Cinéma

## 1. Présentation

Cette API est développée avec Laravel dans le cadre du projet PoC de gestion d'un cinéma.

**URL de base :** `http://cinema.test/api`

Les réponses de l'API sont au format JSON.

## 2. Liste des routes actuellement créées

| Méthode | Chemin | Description |
|---|---|---|
| GET | /films | Récupérer la liste des films |
| GET | /salles | Récupérer la liste des salles |
| GET | /seances | Récupérer la liste des séances |
| GET | /reservations | Récupérer la liste des réservations |

## 3. Structure des données

### Films

Champs définis dans la migration :

- id
- titre
- genre
- duree
- description (facultatif)
- date_sortie (facultatif)
- affiche (facultatif)
- created_at
- updated_at

### Salles

Champs définis dans la migration :

- id
- nom
- capacite
- equipements (facultatif)
- created_at
- updated_at

### Séances

Champs définis dans la migration :

- id
- film_id
- salle_id
- date
- heure
- created_at
- updated_at

### Réservations

Champs définis dans la migration :

- id
- user_id
- seance_id
- nombre_places
- created_at
- updated_at

## 4. Format des réponses

Les quatre routes GET sont destinées à renvoyer des listes JSON.

Exemple de structure attendue pour GET /salles :

```json
[
  {
    "id": 1,
    "nom": "Salle 1",
    "capacite": 120,
    "equipements": "Dolby Atmos"
  }
]
```

Cet exemple illustre le format prévu. Les valeurs réelles dépendront des données présentes dans la base MySQL.

## 5. Tests

Les routes peuvent être testées dans un navigateur ou dans Postman :

- http://cinema.test/api/films
- http://cinema.test/api/salles
- http://cinema.test/api/seances
- http://cinema.test/api/reservations

Les routes POST, PUT/PATCH et DELETE ainsi que leurs réponses seront documentées lorsqu'elles seront implémentées.
