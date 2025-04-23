CREATE DATABASE moviz CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;;
USE moviz;

CREATE TABLE Movies (
    movie_id INT AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    synopsis TEXT NOT NULL,
    release_date YEAR,
    duration TIME,
    image_name VARCHAR(255),
    PRIMARY KEY (movie_id)
);
DROP TABLE Movies;
INSERT INTO Movies (movie_id, title, synopsis, release_date, duration, image_name) VALUES 
(NULL, "", "", "", "");
INSERT INTO Movies (movie_id, title, synopsis, release_date, duration, image_name) VALUES 
(NULL, "Inception", "Un voleur expérimenté dans l'art d'extraire des secrets du subconscient pendant l'état de rêve se voit offrir une chance de retrouver sa vie normale en accomplissant une tâche impossible : l'implantation d'une idée dans l'esprit d'une personne. Au lieu de voler une idée, il doit en placer une.", "2010", "02:28:00", "inception.jpg"),
(NULL, "The Dark Knight, Le Chevalier Noir", "Batman, avec l'aide du Lieutenant Jim Gordon et du procureur Harvey Dent, entreprend de démanteler les organisations criminelles qui sévissent dans Gotham. Leur association s'avère efficace, mais ils se retrouvent bientôt face à un nouveau génie du crime, le Joker, qui plonge Gotham dans l'anarchie.", "2008", "02:32:00", "dark_knight.jpg"),
(NULL, "Interstellar", "Dans un futur proche où la Terre devient inhabitable, un groupe d'explorateurs entreprend la mission la plus importante de l'histoire de l'humanité : franchir les limites de notre galaxie pour déterminer si l'humanité a un avenir parmi les étoiles.", "2014", "02:49:00", "interstellar.jpg"),
(NULL, "Un homme et une femme", "Un pilote de course automobile et une script-girl, tous deux veufs, se rencontrent à l'école de leurs enfants. Ils vont progressivement tomber amoureux l'un de l'autre, malgré le souvenir encore présent de leurs conjoints décédés.", "1966", "01:42:00", "homme_femme.jpg"),
(NULL, "Itinéraire d'un enfant gâté", "Sam Lion, un ancien artiste de cirque devenu un homme d'affaires prospère, simule sa mort et part à l'aventure en Afrique. Il y rencontre Albert Duvivier, un jeune homme qu'il avait employé autrefois, et décide de l'aider à retrouver un sens à sa vie.", "1988", "02:05:00", "itinéraire_enfant.jpg"),
(NULL, "Les Misérables", "Une adaptation moderne du roman de Victor Hugo, transposée pendant la Seconde Guerre mondiale. Henri Fortin, un déménageur illettré, s'identifie au personnage de Jean Valjean et aide une famille juive à fuir la France occupée pour se rendre en Suisse.", "1995", "02:55:00", "misérables.jpg"),
(NULL, "Jurassic Park", "Un milliardaire et son équipe de généticiens parviennent à créer un parc d'attractions peuplé de dinosaures vivants, créés à partir d'ADN préhistorique. Avant son ouverture officielle, le fondateur du parc invite un groupe d'experts pour certifier de sa sécurité, mais les choses tournent mal lorsque les dinosaures s'échappent.", "1993", "02:07:00", "Jurassic_Park.webp"),
(NULL, "E.T. l'extra-terrestre", "Un extraterrestre pacifique, abandonné sur Terre, est découvert et amicalement accueilli par un jeune garçon nommé Elliott. Ensemble, ils trouvent un moyen de renvoyer E.T. sur sa planète d'origine, avant que des scientifiques et agents gouvernementaux ne le capturent pour l'étudier.", "1982", "01:55:00", "E_T.jpg"),
(NULL, "La Liste de Schindler", "L'histoire vraie d'Oskar Schindler, un industriel allemand qui sauva la vie de plus de 1 100 Juifs durant l'Holocauste en les employant dans sa fabrique. Initialement motivé par le profit, Schindler finit par risquer sa fortune et sa vie pour protéger ses ouvriers.", "1993", "03:15:00", "Liste_Schindler.jpg"),
(NULL, "Les Affranchis", "L'histoire vraie de Henry Hill, un gangster américain d'origine irlando-italienne qui a travaillé pour la famille criminelle Lucchese de 1955 à 1980, avant de devenir informateur pour le FBI. Le film retrace son ascension, sa vie luxueuse et sa chute dans le milieu mafieux.", "1990", "02:26:00", "Affranchis.jpg"),
(NULL, "Taxi Driver", "Travis Bickle, un vétéran du Vietnam souffrant d'insomnie, devient chauffeur de taxi la nuit à New York. Témoin de la corruption et de la déchéance urbaine, il se transforme progressivement en justicier urbain, déterminé à sauver une jeune prostituée et à nettoyer les rues de la ville.", "1976", "01:54:00", "Taxi Driver.webp"),
(NULL, "Les Infiltrés", "À Boston, une guerre s'engage entre la police et la pègre irlandaise. Un policier infiltre le gang dirigé par un chef mafieux, tandis que ce dernier place également une taupe dans les rangs policiers. Lorsque chacun des deux camps réalise la présence d'un traître, une course contre la montre s'engage.", "2006", "02:31:00", "Infiltrés.jpg"),
(NULL, "Inglourious Basterds", "Dans la France occupée pendant la Seconde Guerre mondiale, un groupe de soldats juifs américains, connus sous le nom des \"Basterds\", est chargé de répandre la terreur parmi les troupes allemandes en scalpant les soldats nazis. Leur chemin croise celui d'une jeune femme juive qui cherche à venger sa famille assassinée par un colonel SS.", "2009", "02:33:00", "Inglourious_Basterds.jpg"),
(NULL, "Django Unchained", "Dans le sud des États-Unis, deux ans avant la guerre de Sécession, un ancien esclave s'associe à un chasseur de primes allemand qui l'a libéré. Ensemble, ils partent à la recherche de la femme de Django, toujours en esclavage, et affrontent le cruel propriétaire d'une plantation.", "2012", "02:45:00", "Django_Unchained.jpg"),
(NULL, "Kill Bill: Volume 1", "Une ancienne tueuse à gages, connue sous le nom de \"La Mariée\", se réveille après quatre ans de coma et entreprend une vengeance sanglante contre son ancien patron, Bill, et son escadron d'assassins qui l'ont trahie lors de son mariage.", "2003", "01:51:00", "Kill_Bill_1.webp"),
(NULL, "Kill Bill: Volume 2", "Suite de sa vengeance, \"La Mariée\" continue d'éliminer les membres restants de l'escadron d'assassins avant de confronter Bill, son ancien mentor et amant qui a tenté de la tuer le jour de son mariage.", "2004", "02:17:00", "Kill_Bill_2.jpg");

CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT,
    name VARCHAR(255),
    PRIMARY KEY (category_id)
);
INSERT INTO Categories (category_id, name) VALUES 
(NULL, "");
INSERT INTO Categories (category_id, name) VALUES 
(NULL, "Science-fiction"),
(NULL, "Action"),
(NULL, "Thriller"),
(NULL, "Drame"),
(NULL, "Crime"),
(NULL, "Aventure"),
(NULL, "Romance"),
(NULL, "Historique"),
(NULL, "Famille"),
(NULL, "Biographie"),
(NULL, "Guerre"),
(NULL, "Western");

CREATE TABLE Directors (
    director_id INT AUTO_INCREMENT,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    PRIMARY KEY (director_id)
);
INSERT INTO Directors (director_id, first_name, last_name) VALUES 
(NULL, 'Christopher', 'Nolan'),
(NULL, 'Claude', 'Lelouche'),
(NULL, 'Steven', 'Spielberg'),
(NULL, 'Martin', 'Scorsese'),
(NULL, 'Quentin', 'Tarantino');

CREATE TABLE Users (
    user_id INT AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(100) NOT NULL,
    PRIMARY KEY (user_id),
    UNIQUE (pseudo),
    UNIQUE (email)
);
DROP TABLE users;

CREATE TABLE Reviews (
    review_id INT AUTO_INCREMENT,
    review TEXT NOT NULL,
    date_review DATETIME NOT NULL,
    note DECIMAL(2,1) NOT NULL,
    approved BOOLEAN,
    user_id INT NOT NULL,
    movie_id INT NOT NULL,
    PRIMARY KEY (review_id),
    FOREIGN KEY (user_id) REFERENCES Users (user_id),
    FOREIGN KEY (movie_id) REFERENCES Movies (movie_id)
);
DROP TABLE reviews;
INSERT INTO reviews(review_id, review, date_review, note, approved, user_id, movie_id) VALUES
    (NULL, "Très bon film.", NOW(), "4.5", NULL, 1, 1);

CREATE TABLE movie_director (
    movie_id INT,
    director_id INT,
    PRIMARY KEY (movie_id, director_id),
    FOREIGN KEY (movie_id) REFERENCES Movies (movie_id),
    FOREIGN KEY (director_id) REFERENCES Directors (director_id)
);
DROP TABLE movie_director;
INSERT INTO movie_director (movie_id, director_id) VALUES 
(1,1),(2,1),(3,1),
(4,2),(5,2),(6,2),
(7,3),(8,3),(9,3),
(10,4),(11,4),(12,4),
(13,5),(14,5),(15,5),(16,5);

CREATE TABLE movie_category (
    movie_id INT,
    category_id INT,
    PRIMARY KEY (movie_id, category_id),
    FOREIGN KEY (movie_id) REFERENCES Movies (movie_id),
    FOREIGN KEY (category_id) REFERENCES Categories (category_id)
);
DROP TABLE movie_category;
INSERT INTO movie_category (movie_id, category_id) VALUES 
(,);
INSERT INTO movie_category (movie_id, category_id) VALUES 
(1, 1), (1, 2), (1, 3), (1, 4),
(2, 2), (2, 5), (2, 4), (2, 3),
(3, 1), (3, 4), (3, 6),
(4, 7), (4, 4),
(5, 4), (5, 6),
(6, 4), (6, 8),
(7, 1), (7, 6), (7, 2),
(8, 1), (8, 6), (8, 9),
(9, 4), (9, 8), (9, 10),
(10, 5), (10, 4), (10, 10),
(11, 4), (11, 5), (11, 3),
(12, 5), (12, 3), (12, 4),
(13, 11), (13, 2), (13, 4),
(14, 12), (14, 4), (14, 2),
(15, 2), (15, 5), (15, 3),
(16, 2), (16, 5), (16, 3), (16, 4);
