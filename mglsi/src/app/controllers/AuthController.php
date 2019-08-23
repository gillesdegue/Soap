<?php

namespace App\Controllers;


use App\Database\Oracle;
use App\Models\Form\UserForm;

class AuthController extends Controller
{

    public function login()
    {
        if (isset($_SESSION['username'])) {
            header('/home');
            die();
        }
        if (isset($_POST['login'])) {
            $userform = new UserForm();
            $resultat = $userform->login($_POST);
            if ($resultat) {
                $this->view('login', compact('resultat'));
                die();
            }
        }
        $resultat = null;
        $this->view('login', compact('resultat'));
    }

    public function logout()
    {
        session_destroy();
        header('location:/');
        die();
    }


}