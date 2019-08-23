<?php

namespace App\Controllers;

use App\Models\Dao\UserModel;
use App\Models\Form\UserForm;



class USerController extends Controller
{

    public function index()
    {
        $user = new UserModel();
        $users = $user->all();

        return $this->view('admin.user', compact('users'));
    }

    public function create()
    {
        $userform = new UserForm();
        $res = $userform->createUser($_POST);
        echo $res;
    }

    public function show()
    {
        $cmd = $_REQUEST['tbl_id'];
        $user = new UserModel();
        $users = $user->show($cmd);
        echo json_encode($users);
    }

    public function delete()
    {
        $userform = new UserForm();
        $res = $userform->deleteUser($_POST['tbl_id']);
        echo $res;


    }
}