<?php

namespace App\Controllers;


class ModelesController extends Controller{

    public function index() {

        $modeleDonnee = new \App\Models\ModeleDonnees();
        $modeles = $modeleDonnee->all();

        return $this->view('modele', compact('modeles'));

    }

    public function trig() {
                $app = new \App\Models\ModeleDonnees();
                $app = $app->trigger();
                 return $this->view('trig_modele', compact('app'));
            }

    public function create(){
        $id = $_POST['edit_id'];
        $libelle_modele = $_POST['libelle_modele'];
        $cmd = $_POST['form_name'];
        $modeleDonnee = new \App\Models\ModeleDonnees();
        $modeles = $modeleDonnee->add($libelle_modele,$cmd,$id);
        echo $modeles;


    }
    public function delete(){
        $id = $_POST['tbl_id'];
        $modeleDonnee = new \App\Models\ModeleDonnees();
        $modeles = $modeleDonnee->delete($id);
        echo $modeles;


    }
    public function show(){
        $cmd = $_REQUEST['tbl_id'];
        $modeleDonnee = new \App\Models\ModeleDonnees();
        $modeles = $modeleDonnee->show($cmd);
        echo json_encode($modeles);


    }
}
