<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Review;
use App\Repository\MovieRepository;
use App\Repository\ReviewRepository;

class ReviewController extends Controller{
    public function route(): void{
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'reviewsToValidate':
                        $this->reviewsToValidate();
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Lists the reviews to validate
     *
     * @return void
     */
    protected function reviewsToValidate(){
        try {
            $this->render('review/reviews_to_validate', $_SESSION["user"]);
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        } 
    }

}
