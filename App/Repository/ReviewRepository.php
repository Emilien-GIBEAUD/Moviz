<?php

namespace App\Repository;

use App\Entity\Review;

class ReviewRepository extends Repository{
    // public function findAllByMovieId(int $movie_id):array
    // {
    //     $query = $this->pdo->prepare("SELECT * FROM categories AS c
    //                                     LEFT JOIN movie_category AS mc ON mc.category_id = c.category_id
    //                                     WHERE mc.movie_id = :movie_id");
    //     $query->bindParam(':movie_id', $movie_id, $this->pdo::PARAM_STR);
    //     $query->execute();
    //     $categories = $query->fetchALL($this->pdo::FETCH_ASSOC);

    //     $categoriesArray = [];
    //     if ($categories) {
    //         foreach($categories as $category){
    //             $categoriesArray[] = Category::createAndHydrate($category);
    //         }
    //     }
    //     return $categoriesArray;
    // }
}
