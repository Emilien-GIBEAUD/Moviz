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

    public function findAll():array{
        $query = $this->pdo->prepare("SELECT * FROM directors ORDER BY last_name");
        $query->execute();
        $directors = $query->fetchALL($this->pdo::FETCH_ASSOC);

        $allDirectorsArray = [];
        if ($directors) {
            foreach($directors as $director){
                $allDirectorsArray[] = Director::createAndHydrate($director);
            }
        }
        return $allDirectorsArray;
    }

    public function persist(string $movie_title, array $directors): void{
        $movieRepo = new MovieRepository();
        $movie = $movieRepo->findIdBytitle($movie_title);
        $movie_id = $movie->getMovieId();

        $query = $this->pdo->prepare('INSERT INTO movie_director (movie_id, director_id) VALUES (:movie_id, :director_id)');
        foreach($directors as $director) {
            $query->bindValue(':movie_id', $movie_id, $this->pdo::PARAM_INT);
            $query->bindValue(':director_id', (int)$director, $this->pdo::PARAM_INT);
            $query->execute();
        }
    }

}
