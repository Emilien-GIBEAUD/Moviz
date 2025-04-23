<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use App\Entity\Movie;


class MovieController extends Controller{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        $this->show();
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

    protected function show(){
        try {
            if (isset($_GET['movie_id']) && $_GET['movie_id']!== "") {
                // Recupération du film avec le repository
                $movieRepository = new MovieRepository;
                $id = (int)$_GET['movie_id'];
                $movie = $movieRepository->findOneById($id);

                if ($movie) {
                    $this->render('movie/show', [
                    'movie' => $movie,
                ]);
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
}
