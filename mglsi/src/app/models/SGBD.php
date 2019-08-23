<?php

namespace App\Models;

class SGBD extends Model{

    protected $table = "wankoye.r_sgbd";

    public function all(){
        $re =  $this->pdo->query("select s.id_sgbd, s.libelle_sgbd, m.libelle_modele 
                    from $this->table s, wankoye.r_modele_donnee m 
                    where s.id_modele=m.id_modele");
        $data = $re->fetchAll();
        return $data;

    }

    public function trigger(){
        $re =  $this->pdo->query("select * from wankoye.modif_sgbd");
        $data = $re->fetchAll();
        return $data;

    }

    public function add($libelle_sgbd,$id,$cmd,$edit){
        if($cmd=="add_user"){
   try{
        $re =  $this->pdo->exec("begin 
        wankoye.ajout_sgbd('$libelle_sgbd', $id);
        end;");
        return "1";
    }catch(PDOException $e){
            return "0";
    }
}
elseif ($cmd=="edit_user"){
    try{
        $re =  $this->pdo->exec("update wankoye.w_sgbd set libelle_sgbd='$libelle_sgbd', id_modele=$id where id_sgbd=$edit");
        return "1";
    }catch(PDOException $e){
            return "0";
    }
}
}

public function show($cmd){
    $re =  $this->pdo->query("select s.id_sgbd, s.libelle_sgbd, m.id_modele 
    from $this->table s, wankoye.r_modele_donnee m 
    where s.id_modele=m.id_modele and
       s.id_sgbd=$cmd");
    $data = $re->fetch();
    return $data;

}

public function delete($id){
        try{
            $re =  $this->pdo->exec("delete from wankoye.w_sgbd where id_sgbd=$id");
            return "1";
        }catch(PDOException $e){
                return "0";
        }

    }


}