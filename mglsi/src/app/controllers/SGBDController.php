<?php

namespace App\Controllers;


class SGBDController extends Controller{

    public function index() {

        $sgbd = new \App\Models\SGBD();
        $sgbd = $sgbd->all();
        $modeles = new \App\Models\ModeleDonnees;
        $modeles = $modeles->all();

        return $this->view('sgbd', compact('modeles', 'sgbd'));
    }

    public function trig() {
        $app = new \App\Models\SGBD();
        $app = $app->trigger();
         return $this->view('trig_sgbd', compact('app'));
    }

    public function create(){
        $edit = $_POST['edit_id'];
        $libelle_sgbd = $_POST['libelle_sgbd'];
        $id = $_POST['libelle_modele'];
        $cmd = $_POST['form_name'];
        $sgbd = new \App\Models\SGBD();
        $sgbd = $sgbd->add($libelle_sgbd,$id,$cmd,$edit);
        echo $sgbd;


    }

    public function show(){
        $cmd = $_REQUEST['tbl_id'];
        $sgbd = new \App\Models\SGBD();
        $sgbd = $sgbd->show($cmd);
        echo \json_encode($sgbd);
    }
    
    public function delete(){
        $id = $_POST['tbl_id'];
        $modeleDonnee = new \App\Models\SGBD();
        $modeles = $modeleDonnee->delete($id);
        echo $modeles;


    }
    
}