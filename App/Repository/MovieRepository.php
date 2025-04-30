<?php

namespace App\Repository;

use App\Entity\Movie;
use App\Db\Mysql;
use App\Tools\StringTools;

class MovieRepository extends Repository{
    public function findOneById(int $id):bool|Movie
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

    public function findAllMovie():array
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
}
