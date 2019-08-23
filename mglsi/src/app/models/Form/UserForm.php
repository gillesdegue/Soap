<?php

namespace App\Models\Form;

use App\Models\Domain\User;
use App\Models\Dao\UserModel;


class UserForm
{

    private $resultat;
    private $erreur;
    private $message;

    public function createUser($post)
    {
        $id = $_POST['edit_id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $token = $_POST['token'];
        $role = $_POST['role'];
        $cmd = $_POST['form_name'];
        $usermodel = new UserModel();
        $user = new User();
        $user->id = $id;
        $user->nom = $nom;
        $user->prenom = $prenom;
        $user->pseudo = $pseudo;
        $user->password = $password;
        $user->token = $token;
        $user->role = $role;
        if ($user->id != '0') {
            $data = $usermodel->show($user->id);
            if ($data->password != $user->password) {
                $user->password = sha1($password);
            }
            if ($data->token != $user->token) {
                $user->token = sha1($token);
            }
            if ($usermodel->updateUser($user)) {
                return "1";
            } else {
                return "0";
            }
        } else {
            if ($usermodel->getByPseudo($pseudo)) {
                return "0";
            } else {
                if ($usermodel->insertUser($user)) {
                    return "1";
                } else {
                    return "0";
                }
            }

        }
    }

    public function deleteUser($id)
    {
        $user = new UserModel();
        if ($user->deleteUser($id)) {
            return "1";
        } else {
            return "0";
        }
    }

    public function login($post)
    {

        $pseudo = $post['login'];
        $password = $post['password'];
        $user = new User();
        $usermodel = new UserModel();
        $pseudo_err = $this->validationPseudo($post['login']);
        $password_err = $this->validationPassword($post['password']);
        //var_dump($pseudo, $password);
        //var_dump($usermodel->getByPseudoAndPassword($pseudo, sha1($password)));
        if ($pseudo_err == "" && $password_err == "") {
            if ($data = $usermodel->getByPseudoAndPassword($pseudo, sha1($password))) {

                $_SESSION['user'] = [
                    'id' => $data->id,
                    'pseudo' => $pseudo,
                    'password' => $password,
                    'role' => $data->role
                ];
                return $this->erreur['user'] = [
                    'pseudo' => $pseudo,
                    'password' => $password,
                    'pseudo_err' => $pseudo_err,
                    'password_err' => $password_err,
                    'message' => 'Connexion reussi'
                ];
            } else {
                return $this->erreur['user'] = [
                    'pseudo' => $pseudo,
                    'password' => $password,
                    'pseudo_err' => $pseudo_err,
                    'password_err' => $password_err,
                    'message' => 'Echec de la connexion'
                ];
            }

        } else {
            return $this->erreur['user'] = [
                'pseudo' => $pseudo,
                'password' => $password,
                'pseudo_err' => $pseudo_err,
                'password_err' => $password_err,
                'message' => 'Echec de la connexion'
            ];
        }
    }

    public function validationPseudo($pseudo)
    {
        if ($pseudo != null) {
            if (strlen($pseudo) < 2) {
                return "Le pseudo doit contenir au moins deux caracteres";
            } else {
                return "";
            }
        } else {
            return "Merci d'entrer un pseudo valide.";
        }

    }

    public function validationPassword($password)
    {
        if ($password != null) {
            if (strlen($password) < 2) {
                return "Le mot de passe doit contenir au moins deux caracteres";
            } else {
                return "";
            }
        } else {
            return "Merci d'entrer un mot de passe valide.";
        }

    }
}