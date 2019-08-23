<?php

namespace App\Models\Dao;

class UserModel extends Model
{

    protected $table = 'utilisateur';


    public function show($cmd)
    {
        return $this->query("select * from $this->table where id= ?", array($cmd), true);

    }

    public function insertUser($user)
    {

        return $this->query("INSERT INTO $this->table (nom, prenom, pseudo, password, token, role) VALUES(?, ?, ?, ?, ?, ?)", array($user->nom, $user->prenom, $user->pseudo, $user->password, $user->token, $user->role));
    }

    public function updateUser($user)
    {

        return $this->query("UPDATE $this->table set nom=?, prenom=?, pseudo=?, password=?, token=?, role=? where id=?", array($user->nom, $user->prenom, $user->pseudo, $user->password, $user->token, $user->role, $user->id));

    }

    public function deleteUser($id)
    {
        return $this->query("DELETE from $this->table where id = ?", array($id));
    }

    public function getByPseudoAndPassword($pseudo, $password)
    {
        return $this->query(' SELECT * FROM utilisateur WHERE pseudo = ? and password =?', array($pseudo, $password), true);
       // $req->execute(array($pseudo, $password));
       // $data = $req->fetch(PDO::FETCH_OBJ);
       // return $data;
    }

    public function getByPseudo($pseudo)
    {
        return $this->query(' SELECT * FROM utilisateur WHERE pseudo = ? ', array($pseudo), true);
       // $req->execute(array($pseudo, $password));
       // $data = $req->fetch(PDO::FETCH_OBJ);
       // return $data;
    }

    public function getByPseudoAndToken($pseudo, $token)
    {
        return $this->query(' SELECT * FROM utilisateur WHERE pseudo = ? and token =?', array($pseudo, $token), true);
       // $req->execute(array($pseudo, $password));
       // $data = $req->fetch(PDO::FETCH_OBJ);
       // return $data;
    }

}