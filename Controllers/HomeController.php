<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class HomeController extends Controller
{
    public function index()
    {
       $array = array();
       $this->returnJson($array);
    }
    public function testando()
    {
        echo 'FUNCIONOU';
    }
    public function visualizar_usuarios($id)
    {
        echo 'ID: '.$id;
    }


}


