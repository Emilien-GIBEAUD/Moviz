<?php

namespace App\Repository;

use App\Entity\Movie;
use App\Tools\Tools;
use App\Db\Mysql;
use App\Tools\StringTools;

class MovieRepository extends Repository{
    public function findOneById(int $id): bool|Movie
    {
        $query = $this->pdo->prepare("SELECT * FROM movies WHERE movie_id = :id");
        $query->bindParam(':id', $id, $this->pdo::PARAM_STR);
        $query->execute();
        $movie = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($movie) {
            return Movie::createAndHydrate($movie);;
        } else {
            return false;
        }
    }

    public function findAllMovie(): array
    {
        $query = $this->pdo->prepare("SELECT * FROM movies ORDER BY movie_id DESC");
        $query->execute();
        $movies = $query->fetchALL($this->pdo::FETCH_ASSOC);

        $moviesArray = [];
        if ($movies) {
            foreach($movies as $movie){
                $moviesArray[] = Movie::createAndHydrate($movie);
            }
        }
        return $moviesArray;
    }

    public function findIdBytitle(string $title): bool|Movie
    {
        $query = $this->pdo->prepare("SELECT * FROM movies WHERE title = :title");
        $query->bindParam(':title', $title, $this->pdo::PARAM_STR);
        $query->execute();
        $movie = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($movie) {
            return Movie::createAndHydrate($movie);;
        } else {
            return false;
        }
    }

    public function persist(Movie $movie, string $imageName): bool
    {
        if ($movie->getMovieId() !== null) {
            $query = $this->pdo->prepare('UPDATE movies SET title = :title, synopsis = :synopsis, release_date = :release_date, duration = :duration, image_name = :image_name WHERE id = :id');
            $query->bindValue(':id', $movie->getMovieId(), $this->pdo::PARAM_INT);
        } else {
            $query = $this->pdo->prepare('INSERT INTO movies (title, synopsis, release_date, duration, image_name) VALUES (:title, :synopsis, :release_date, :duration, :image_name)');
        }
        $duration = $movie->getDuration()->format('H:i:s');  // transforme la durée en "HH:MM:SS"

        $query->bindValue(':title', $movie->getTitle(), $this->pdo::PARAM_STR);
        $query->bindValue(':synopsis', $movie->getSynopsis(), $this->pdo::PARAM_STR);
        $query->bindValue(':release_date', $movie->getReleaseDate(), $this->pdo::PARAM_STR);
        $query->bindValue(':duration', $duration, $this->pdo::PARAM_STR);
        $query->bindValue(':image_name', $imageName, $this->pdo::PARAM_STR);

        return $query->execute();
    }

}
