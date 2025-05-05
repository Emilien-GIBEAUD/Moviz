<?php

namespace App\Repository;

use DateTime;
use App\Db\Mysql;
use App\Entity\Review;

class ReviewRepository extends Repository{
    /**
     * Returns an array with all the valid reviews of a movie_id. 
     * Valid reviews are reviews with reviews.approved > 0
     *
     * @param integer $movie_id : movie_id of the movie in the tables movies.
     * @return array : array with all the valid reviews of the movie_id.
     */
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

    /**
     * Saves a review (using a Review object $review) of a movie (using his $movie_id) from a user (using his $user_id). The attribute approved takes the value NULL.
     *
     * @param Review $review : the Review object.
     * @param integer $user_id : user_id of the user in the table users.
     * @param integer $movie_id : movie_id of the movie in the table movies.
     * @return boolean : return true if the review is saved in the table reviews.
     */
    public function persist(Review $review, int $user_id, int $movie_id) :bool{
        $query = $this->pdo->prepare('INSERT INTO reviews (review, date_review, note, approved, user_id, movie_id) VALUES (:review, :date_review, :note, :approved, :user_id, :movie_id)');

        $date = new DateTime();
        $date_review = $date->format('Y-m-d H:i:s');  // transforme la date en "YYYY-MM-DD HH:MM:SS"

        $query->bindValue(':review', $review->getReview(), $this->pdo::PARAM_STR);
        $query->bindValue(':date_review', $date_review, $this->pdo::PARAM_STR);
        $query->bindValue(':note', $review->getNote(), $this->pdo::PARAM_STR);
        $query->bindValue(':approved', $review->getApproved(), $this->pdo::PARAM_BOOL);
        $query->bindValue(':user_id', $user_id, $this->pdo::PARAM_INT);
        $query->bindValue(':movie_id', $movie_id, $this->pdo::PARAM_INT);

        return $query->execute();
    }

    /**
     * Returns an array with all the reviews to validate. 
     * Reviews to validate are reviews with reviews.approved = NULL
    *
    * @param Mysql $mysql : The DB connection object used to query the DB
    * @return array : Array with all the reviews to validate.
    */
    public static function reviewsToValidate(Mysql $mysql) :array{
        $pdo = $mysql->getPDO();
        $query = $pdo->prepare("  SELECT    r.*, 
                                                u.email AS email, u.pseudo AS pseudo, 
                                                m.title AS title
                                        FROM reviews AS r
                                        LEFT JOIN users AS u ON u.user_id = r.user_id
                                        LEFT JOIN movies AS m ON m.movie_id = r.movie_id
                                        WHERE r.approved IS NULL");
        $query->execute();
        $reviews = $query->fetchALL($pdo::FETCH_ASSOC);

        $reviewsToValidate = [];
        if ($reviews) {
            foreach($reviews as $review){
                $reviewsToValidate[] = Review::createAndHydrate($review);
            }
        }
        return $reviewsToValidate;
    }

}

