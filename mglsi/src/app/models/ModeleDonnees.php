<?php

namespace App\Models;

class ModeleDonnees extends Model{

    protected $table="wankoye.r_modele_donnee";

    public function trigger(){
        $re =  $this->pdo->query("select * from wankoye.modif_modele");
        $data = $re->fetchAll();
        return $data;

    }

    public function add($libelle_modele,$cmd,$id){
        if($cmd=="add_user"){
   try{
        $re =  $this->pdo->exec("begin 
        wankoye.ajout_modele('$libelle_modele');
        end;");
        return "1";
    }catch(PDOException $e){
            return "0";
    }
}
elseif ($cmd=="edit_user"){
    try{
        $re =  $this->pdo->exec("update wankoye.w_modele_donnee set libelle_modele='$libelle_modele' where id_modele=$id");
        return "1";
    }catch(PDOException $e){
            return "0";
    }
}

    }
    public function show($cmd){
        $re =  $this->pdo->query("select * from wankoye.r_modele_donnee where id_modele='$cmd'");
        $data = $re->fetch();
        return $data;

    }
    public function delete($id){
        try{
            $re =  $this->pdo->exec("delete from wankoye.w_modele_donnee where id_modele=$id");
            return "1";
        }catch(PDOException $e){
                return "0";
        }

    }
    
}