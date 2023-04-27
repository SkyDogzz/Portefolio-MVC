<?php

namespace App\Controllers;

class ContactController extends BaseController
{

    public function index()

    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Les données de formulaire ont été soumises en POST

            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            // TODO: Traitement et enregistrement du message de contact

            // Rediriger vers la page de confirmation
            $this->redirect('/contact/confirmation');
        }

        // Afficher le formulaire de contact
        $this->renderView('contact/index');
    }

    public function confirmation()
    {
        $this->renderView('contact/confirmation');
    }
}
