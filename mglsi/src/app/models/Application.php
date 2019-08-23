<?php

namespace App\Models;

class Application extends Model{

    protected $table = "wankoye.r_application";

    public function trigger(){
        $re =  $this->pdo->query("select * from wankoye.modif_application");
        $data = $re->fetchAll();
        return $data;

    }

    public function all(){
        $re =  $this->pdo->query("select a.id_appli, a.libelle_appli, s.libelle_sgbd 
                    from $this->table a, wankoye.r_sgbd s
                    where a.id_sgbd=s.id_sgbd");
        $data = $re->fetchAll();
        return $data;

    }

    public function add($libelle_appli,$id,$cmd,$edit){
        if($cmd=="add_user"){
   try{
        $re =  $this->pdo->exec("begin 
        wankoye.ajout_application('$libelle_appli', $id);
        end;");
        return "1";
    }catch(PDOException $e){
            return "0";
    }
}
elseif ($cmd=="edit_user"){
    try{
        $re =  $this->pdo->exec("update wankoye.w_application set libelle_appli='$libelle_appli', id_sgbd=$id where id_appli=$edit");
        return "1";
    }catch(PDOException $e){
            return "0";
    }
}
}

public function show($cmd){
    $re =  $this->pdo->query("select a.id_appli, a.libelle_appli, s.id_sgbd 
    from $this->table a, wankoye.r_sgbd s
    where a.id_sgbd=s.id_sgbd and
       a.id_appli=$cmd");
    $data = $re->fetch();
    return $data;

}

public function delete($id){
        try{
            $re =  $this->pdo->exec("delete from wankoye.w_application where id_appli=$id");
            return "1";
        }catch(PDOException $e){
                return "0";
        }

    }

}