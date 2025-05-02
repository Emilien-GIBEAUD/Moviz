<?php

namespace App\Repository;

use App\Entity\Review;
use DateTime;

class ReviewRepository extends Repository{
    public function findAllByMovieId(int $movie_id):array
    {
        $query = $this->pdo->prepare("SELECT r.*, u.pseudo AS pseudo FROM reviews AS r
                                        LEFT JOIN users AS u ON u.user_id = r.user_id
                                        WHERE r.movie_id = :movie_id &&
                                        r.approved > 0");
        $query->bindParam(':movie_id', $movie_id, $this->pdo::PARAM_STR);
        $query->execute();
        $reviews = $query->fetchALL($this->pdo::FETCH_ASSOC);

        $reviewsArray = [];
        if ($reviews) {
            foreach($reviews as $review){
                $reviewsArray[] = Review::createAndHydrate($review);
            }
        }
        return $reviewsArray;
    }

    public function persist(Review $review, int $user_id, int $movie_id) :bool{
        $query = $this->pdo->prepare('INSERT INTO reviews (review, date_review, note, approved, user_id, movie_id) VALUES (:review, :date_review, :note, :approved, :user_id, :movie_id)');

        $date = new DateTime();
        $date_review = $date->format('Y-m-d H:i:s');  // transforme la date en "YYYY-MM-DD"

        $query->bindValue(':review', $review->getReview(), $this->pdo::PARAM_STR);
        $query->bindValue(':date_review', $date_review, $this->pdo::PARAM_STR);
        $query->bindValue(':note', $review->getNote(), $this->pdo::PARAM_STR);
        $query->bindValue(':approved', $review->getApproved(), $this->pdo::PARAM_BOOL);
        $query->bindValue(':user_id', $user_id, $this->pdo::PARAM_INT);
        $query->bindValue(':movie_id', $movie_id, $this->pdo::PARAM_INT);

        return $query->execute();
    }

}
