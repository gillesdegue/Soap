<?php
namespace App\SoapApi;

use App\Models\Dao\UserModel;
use App\Models\Domain\User;

class My_Soap
{


    /** 
     * Lister Utilisateur Function
     * 
     *
     * @return App\Models\Domain\User[]
     */
    public function listerUser()
    {
        $user = new UserModel();
        $data = $user->all();
        return $data;
    }
    /** 
     * Ajouter un Utilisateur Function
     * 
     *@param string $nom
     *@param string $prenom
     *@param string $pseudo
     *@param string $password
     * @return string  
     */
    public function ajouterUser($nom, $prenom, $pseudo, $password)
    {
        $user = new User();
        $user->nom = $nom;
        $user->prenom = $prenom;
        $user->pseudo = $pseudo;
        $user->password = sha1($password);
        $user->role = "editeur";
        $user->token = "";
        $usermodel = new UserModel();
       // $data = $usermodel->insertUser($user);
        if ($usermodel->insertUser($user)) {
            return "1";
        } else {
            return "0";
        }
    }
    /** 
     * Ajouter un Utilisateur Function
     * 
     *@param string $id
     *@param string $nom
     *@param string $prenom
     *@param string $pseudo
     *@param string $password
     * @return string  
     */
    public function modifierUser($id, $nom, $prenom, $pseudo, $password)
    {
        $user = new User();
        $user->id = $id;
        $user->nom = $nom;
        $user->prenom = $prenom;
        $user->pseudo = $pseudo;
        $user->password = $password;
        $user->role = "editeur";
        $user->token = "";
        $usermodel = new UserModel();
        $data = $usermodel->show($user->id);
        if (!empty($user->password)) {
            $user->password = sha1($password);
        } else {
            $user->password = $data->password;
        }
        if ($usermodel->updateUser($user)) {
            return "1";
        } else {
            return "0";
        }
    }
    /** 
     * Supprimer un Utilisateur Function
     * 
     *@param int $id
     * @return string  
     */
    public function supprimerUser($id)
    {
        $usermodel = new UserModel();
        if ($usermodel->deleteUser($id)) {
            return "1";
        } else {
            return "0";
        }
    }
    /** 
     * Login Function
     * 
     * @param string $pseudo 
     * @param string $token
     * @return string 
     */
    public function Login($pseudo, $token)
    {
        $user = new UserModel();
        $data = $user->getByPseudoAndToken($pseudo, sha1($token));
        if (!empty($data)) {
            return "1";
        } else {
            return "0";
        }
    }
    /** 
     * Returns Hello World. 
     * 
     * @param string $world 
     * @return string 
     */
    public function getInterAdmins($world)
    {
        return 'hello' . $world;
    }

    /**
     * SayHello Function
     * Use test soap service
     * @param string $name
     * @return string Hello ,$name
     */
    public function SayHello($name)
    {
        return "Hello, " . $name;
    }
}