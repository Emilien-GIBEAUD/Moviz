<?php

namespace App\Repository;

use App\Entity\Director;

class DirectorRepository extends Repository{
    public function findAllByMovieId(int $movie_id):array
    {
        $query = $this->pdo->prepare("SELECT * FROM directors AS d
                                        LEFT JOIN movie_director AS md ON md.director_id = d.director_id
                                        WHERE md.movie_id = :movie_id");
        $query->bindParam(':movie_id', $movie_id, $this->pdo::PARAM_STR);
        $query->execute();
        $directors = $query->fetchALL($this->pdo::FETCH_ASSOC);

        $directorsArray = [];
        if ($directors) {
            foreach($directors as $director){
                $directorsArray[] = Director::createAndHydrate($director);
            }
        }
        return $directorsArray;
    }
}
