<?php

namespace App\Controllers;

use App\Models\User;

class AdminController extends BaseController
{
    public function index()
    {
        if (!$this->isLoggedIn()) {
            // Rediriger vers la page de connexion
            $this->redirect('/admin/login');
        }

        // Rediriger vers le tableau de bord
        $this->redirect('/admin/dashboard');
    }

    public function dashboard()
    {
        if (!$this->isLoggedIn()) {
            // Rediriger vers la page de connexion
            $this->redirect('/admin/login');
        }

        // Afficher le tableau de bord
        echo 'Dashboard';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Les données de connexion ont été soumises en POST

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = User::authenticate($email, $password);

            if ($user) {
                // La connexion a réussi, enregistrer l'utilisateur dans une variable de session
                $_SESSION['user_id'] = $user->getId();

                // Rediriger vers le tableau de bord
                $this->redirect('/admin/dashboard');
            } else {
                // La connexion a échoué, afficher un message d'erreur
                $errorMessage = 'Adresse e-mail ou mot de passe incorrect.';
            }
        }

        // Afficher le formulaire de connexion
        $this->renderView('admin/login', [
            'errorMessage' => $errorMessage ?? null,
        ]);
    }

    public function logout()
    {
        // Détruire la session et rediriger vers la page de connexion
        session_destroy();
        $this->redirect('/admin/login');
    }

    private function isLoggedIn()
    {
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $user = User::find($user_id);

            if ($user) {
                return true;
            }
        }

        return false;
    }
}
