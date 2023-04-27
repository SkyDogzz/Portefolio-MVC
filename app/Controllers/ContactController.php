<?php

namespace App\Controllers;

use App\Models\Contact;

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

            $contactModel = new Contact();
            $contactModel->save([
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'message' => $message
            ]);

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
