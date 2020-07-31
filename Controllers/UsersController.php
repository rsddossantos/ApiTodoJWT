<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;

class UsersController extends Controller
{
    public function index(){}

    public function login()
    {
        $array = array('error'=>'');
        $method = $this->getMethod();
        $data = $this->getRequestData();
        if($method == 'POST') {
            if(!empty($data['email']) && !empty($data['pass'])) {
                $users = new Users();
                if($users->checkCredentials($data['email'], $data['pass'])) {
                    // Gerar o JWT
                    $array['jwt'] = '...';
                } else {
                    $array['error'] = 'Acesso negado';
                }
            } else {
                $array['error'] = 'E-mail e/ou senha não foram enviados!';
            }
        } else {
            $array['error'] = 'Método de requisição incompatível!';
        }
        $this->returnJson($array);
    }


}