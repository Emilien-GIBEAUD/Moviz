<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Review;
use App\Repository\MovieRepository;
use App\Repository\ReviewRepository;
use App\Repository\CategoryRepository;
use App\Repository\DirectorRepository;
use App\Repository\UserRepository;
use App\Tools\FileTools;

class MovieController extends Controller{
    public function route(): void{
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        $this->show();
                        break;
                    case 'list':
                        $this->list();
                        break;
                    case 'review':
                        $this->review();
                        break;
                    case 'add':
                        $this->add();
                        break;
                    case 'delete':
                        // Appeler méthode delete()
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
     * Shows a movie page from a movie_id
     *
     * @return void
     */
    protected function show(){
        try {
            if (isset($_GET['movie_id']) && $_GET['movie_id']!== "") {
                // Recupération du film avec le repository
                $movieRepository = new MovieRepository;
                $movie_id = (int)$_GET['movie_id'];
                $movie = $movieRepository->findOneById($movie_id);

                if ($movie) {
                    $categoryRepository = new CategoryRepository();
                    $categories = $categoryRepository->findAllByMovieId($movie_id);

                    $directorRepository = new DirectorRepository();
                    $directors = $directorRepository->findAllByMovieId($movie_id);

                    $reviewrepository = new ReviewRepository();
                    $reviews = $reviewrepository->findAllByMovieId($movie_id);

                    if(isset($_SESSION["user"])){
                        $this->render('movie/show', array_merge([
                            'movie' => $movie,
                            'categories' => $categories,
                            'directors' => $directors,
                            'reviews' => $reviews,
                        ],$_SESSION["user"]));
                    } else {
                        $this->render('movie/show', [
                            'movie' => $movie,
                            'categories' => $categories,
                            'directors' => $directors,
                            'reviews' => $reviews,
                        ]);
                    }
        
                } else {
                    throw new \Exception("L'id en paramètre URL est inconnu.", 1);
                }
            } else {
                throw new \Exception("L'id en paramètre URL est manquant.", 1);
            }

        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        } 
    }

    /**
     * Lists all the movies
     *
     * @return void
     */
    protected function list(){
        try {
            $movieRepository = new MovieRepository;
            $movies = $movieRepository->findAllMovie();

            if(isset($_SESSION["user"])){
                $this->render('movie/list', array_merge([
                    'movies' => $movies,
                ],$_SESSION["user"]));
            } else {
                $this->render('movie/list', [
                    'movies' => $movies,
                    ]);
            }
    
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        } 
    }

    /**
     * Adds a movie (for admin only)
     *
     * @return void
     */
    protected function add(): void{
        try {
            $errors = [];
            $movie = new Movie();
            if ($_SESSION["user"]["role"] === "admin") {
                $categoryRepository = new CategoryRepository();
                $categories = $categoryRepository->findAll();
                $directorRepository = new DirectorRepository();
                $directors = $directorRepository->findAll();

                if (isset($_POST["saveMovie"])) {
                    $movie->hydrate($_POST);
                    FileTools::verifyImage("image_name");
                    // $errors = $movie->validate();  // A FAIRE A FAIRE A FAIRE A FAIRE A FAIRE

                    if (empty($errors)) {
                        $image = FileTools::uploadImage(_MOVIES_IMG_DIR_,"image_name");
                        $movieRepository = new MovieRepository();
                        $movieRepository->persist($movie,$image["fileName"]);

                        $categories = new CategoryRepository();
                        $categories->persist($_POST["title"],$_POST["category"]);

                        $directors = new DirectorRepository();
                        $directors->persist($_POST["title"],$_POST["director"]);
                        header("Location: /?controller=movie&action=list");
                    }
                }

                $this->render('movie/add', array_merge([
                    'categories' => $categories,
                    'directors' => $directors,
                    'errors' => $errors,
                ],$_SESSION["user"]));
            } else {
                throw new \Exception("Cette page requiert les droits administrateur !", 1);
            }

        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        } 
    }

    /**
     * Saves a review
     *
     * @return void
     */
    protected function review(){
        try {
            $errors = [];
            $review = new Review();
            if (isset($_GET['movie_id']) && $_GET['movie_id']!== "" && isset($_SESSION["user"])) {
                // Recupération du film avec le repository
                $movieRepository = new MovieRepository;
                $movie_id = (int)$_GET['movie_id'];
                $movie = $movieRepository->findOneById($movie_id);

                if ($movie) {
                    $categoryRepository = new CategoryRepository();
                    $categories = $categoryRepository->findAllByMovieId($movie_id);

                    $directorrepository = new DirectorRepository();
                    $directors = $directorrepository->findAllByMovieId($movie_id);

                    if(isset($_POST["saveReview"])){
                        $review->hydrate($_POST);
                        // $errors = $review->validate();  // A FAIRE A FAIRE A FAIRE A FAIRE A FAIRE
                        if (empty($errors)) {
                            $reviewRepository = new ReviewRepository();
                            $reviewRepository->persist($review, $_SESSION["user"]["user_id"], $movie_id);
                            header("Location: /?controller=movie&action=show&movie_id=$movie_id");
                        }
                    }
                    $this->render('review/add', array_merge([
                        'movie' => $movie,
                        'categories' => $categories,
                        'directors' => $directors,
                    ],$_SESSION["user"]));
        
                } else {
                    throw new \Exception("L'id en paramètre URL est inconnu.", 1);
                }
            } else if (!isset($_SESSION["user"])) {
                header ('location: index.php?controller=auth&action=login');
            } else {
                throw new \Exception("L'id en paramètre URL est manquant.", 1);
            }
    
        } catch (\Exception $e) {
            $this->render('errors/default', array_merge([
                'error' => $e->getMessage()
            ],$_SESSION["user"]));
        } 
    }

}
