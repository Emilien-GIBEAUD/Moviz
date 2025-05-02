<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Movie;

class CategoryRepository extends Repository{
    public function findAllByMovieId(int $movie_id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM categories AS c
                                        LEFT JOIN movie_category AS mc ON mc.category_id = c.category_id
                                        WHERE mc.movie_id = :movie_id");
        $query->bindParam(':movie_id', $movie_id, $this->pdo::PARAM_STR);
        $query->execute();
        $categories = $query->fetchALL($this->pdo::FETCH_ASSOC);

        $categoriesArray = [];
        if ($categories) {
            foreach($categories as $category){
                $categoriesArray[] = Category::createAndHydrate($category);
            }
        }
        return $categoriesArray;
    }

    public function findAll(): array{
        $query = $this->pdo->prepare("SELECT * FROM categories ORDER BY name");
        $query->execute();
        $categories = $query->fetchALL($this->pdo::FETCH_ASSOC);

        $allCategoriesArray = [];
        if ($categories) {
            foreach($categories as $category){
                $allCategoriesArray[] = Category::createAndHydrate($category);
            }
        }
        return $allCategoriesArray;
    }

    public function persist(string $movie_title, array $categories): void{
        $movieRepo = new MovieRepository();
        $movie = $movieRepo->findIdBytitle($movie_title);
        $movie_id = $movie->getMovieId();

        $query = $this->pdo->prepare('INSERT INTO movie_category (movie_id, category_id) VALUES (:movie_id, :category_id)');
        foreach($categories as $category) {
            $query->bindValue(':movie_id', $movie_id, $this->pdo::PARAM_INT);
            $query->bindValue(':category_id', (int)$category, $this->pdo::PARAM_INT);
            $query->execute();
        }
    }

}
