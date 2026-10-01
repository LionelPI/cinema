-- Données de test pour le projet cinema

-- Films
INSERT INTO films (titre, genre, duree, description, date_sortie, affiche) VALUES
                                                                               ('Inception', 'Science-fiction', 148, 'Un voleur entre dans les rêves pour voler des secrets.', '2010-07-21', 'inception.jpg'),
                                                                               ('Interstellar', 'Science-fiction', 169, 'Une équipe voyage à travers un trou de ver pour chercher une nouvelle planète habitable.', '2014-11-05', 'interstellar.jpg'),
                                                                               ('Le Seigneur des Anneaux', 'Fantastique', 178, 'Un jeune Hobbit doit détruire un anneau puissant pour empêcher le retour du mal.', '2001-12-19', 'seigneur_des_anneaux.jpg');

-- Salles
INSERT INTO salles (nom, capacite, equipements) VALUES
                                                    ('Salle 1', 100, 'Projecteur, Son Dolby'),
                                                    ('Salle 2', 80, 'Projecteur, Son Dolby'),
                                                    ('Salle 3', 60, 'Projecteur, Son standard');

-- Séances
INSERT INTO seances (film_id, salle_id, date, heure) VALUES
                                                         (1, 1, '2026-10-06', '18:00:00'),
                                                         (2, 2, '2026-10-06', '20:30:00'),
                                                         (3, 3, '2026-10-07', '18:30:00');
