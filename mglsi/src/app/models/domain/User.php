<?php
namespace App\Models\Domain;
/**
 * Classe métier représentant un utilisateur
 */
class User
{
    /**
     * 
     * @var string $id 
     */
    public $id;
    /**
     * 
     * @var string $nom 
     */
    public $nom;
    /**
     * 
     * @var string $prenom 
     */
    public $prenom;
    /**
     * 
     * @var string $pseudo 
     */
    public $pseudo;
    /**
     * 
     * @var string $token 
     */
    public $token;
    /**
     * 
     * @var string $password 
     */
    public $password;
    /**
     * 
     * @var string $role 
     */
    public $role;

    function __construct()
    {

    }
}
?>