<?php

namespace App\Controllers;


class AppController extends Controller{

    public function index() {

        $app = new \App\Models\Application();
        $app = $app->all();
        $sgbd = new \App\Models\SGBD;
        $sgbd = $sgbd->all();

        return $this->view('appli', compact('app'));
    }
   
    public function trig() {
        
                $app = new \App\Models\Application();
                $app = $app->trigger();
        
                return $this->view('trig_appli', compact('sgbd', 'app'));
            }

    public function create(){
        $edit = $_POST['edit_id'];
        $libelle_sgbd = $_POST['libelle_appli'];
        $id = $_POST['libelle_sgbd'];
        $cmd = $_POST['form_name'];
        $sgbd = new \App\Models\Application();
        $sgbd = $sgbd->add($libelle_sgbd,$id,$cmd,$edit);
        echo $sgbd;


    }

    public function show(){
        $cmd = $_REQUEST['tbl_id'];
        $sgbd = new \App\Models\Application();
        $sgbd = $sgbd->show($cmd);
        echo json_encode($sgbd);
    }
    
    public function delete(){
        $id = $_POST['tbl_id'];
        $modeleDonnee = new \App\Models\Application();
        $modeles = $modeleDonnee->delete($id);
        echo $modeles;


    }
    
}