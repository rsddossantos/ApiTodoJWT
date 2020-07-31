<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class UsersController extends Controller
{
    public function index(){}

    public function login()
    {
        $dados = array('error'=>'Testando');

        $this->returnJson($dados);
    }


}