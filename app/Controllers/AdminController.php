<?php

namespace App\Controllers;

use App\Models\Contact;
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

        $contactModel = new Contact();
        $contacts = $contactModel->getContact();

        // Afficher le tableau de bord
        $this->renderView('admin/dashboard', [
            'contacts' => $contacts,
        ]);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Les données de connexion ont été soumises en POST

            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->authenticate($email, $password);

            if ($user) {
                // La connexion a réussi, enregistrer l'utilisateur dans une variable de session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['is_admin'] = $user['is_admin'];

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
            $userModel = new User();
            $user = $userModel->find($user_id);

            if ($user) {
                return true;
            }
        }

        return false;
    }
}
