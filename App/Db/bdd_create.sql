CREATE DATABASE moviz CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;;
USE moviz;

CREATE TABLE Movies (
    movie_id INT AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    synopsis TEXT NOT NULL,
    release_date DATE NOT NULL,
    duration TIME NOT NULL,
    image_name VARCHAR(50),
    PRIMARY KEY (movie_id)
);

CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT,
    name VARCHAR(50),
    PRIMARY KEY (category_id)
);

CREATE TABLE Directors (
    director_id INT AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    PRIMARY KEY (director_id)
);

CREATE TABLE Users (
    user_id INT AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    pseudo VARCHAR(50) NOT NULL,
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
    date_ DATETIME NOT NULL,
    note INT NOT NULL,
    approved VARCHAR(50) NOT NULL,
    user_id INT NOT NULL,
    movie_id INT NOT NULL,
    PRIMARY KEY (review_id),
    FOREIGN KEY (user_id) REFERENCES Users (user_id),
    FOREIGN KEY (movie_id) REFERENCES Movies (movie_id)
);

CREATE TABLE movie_director (
    movie_id INT,
    director_id INT,
    PRIMARY KEY (movie_id, director_id),
    FOREIGN KEY (movie_id) REFERENCES Movies (movie_id),
    FOREIGN KEY (director_id) REFERENCES Directors (director_id)
);

CREATE TABLE movie_category (
    movie_id INT,
    category_id INT,
    PRIMARY KEY (movie_id, category_id),
    FOREIGN KEY (movie_id) REFERENCES Movies (movie_id),
    FOREIGN KEY (category_id) REFERENCES Categories (category_id)
);