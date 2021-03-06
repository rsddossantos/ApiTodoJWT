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
                    $array['jwt'] = $users->createJwt();
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
    public function new_record()
    {
        $array = array('error'=>'');
        $method = $this->getMethod();
        $data = $this->getRequestData();
        if($method == 'POST') {
            if(!empty($data['name']) && !empty($data['email']) && !empty($data['pass'])) {
                if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $users = new Users();
                    if($users->create($data['name'], $data['email'], $data['pass'])) {
                        $array['jwt'] = $users->createJwt();
                    } else {
                        $array['error'] = 'E-mail já cadastrado!';
                    }
                } else {
                    $array['error'] = 'E-mail inválido!';
                }
            } else {
                $array['error'] = 'Dados não foram enviados!';
            }
        } else {
            $array['error'] = 'Método de requisição incompatível!';
        }
        $this->returnJson($array);
    }
    public function view($id)
    {
        $array = array('error'=>'', 'logged' => false);
        $method = $this->getMethod();
        $data = $this->getRequestData();
        $users = new Users();
        if(!empty($data['jwt']) && $users->validateJwt($data['jwt'])) {
            $array['logged'] = true;
            $array['is_me'] = false;
            if($id == $users->getId()) {
                $array['is_me'] = true;
            }
            switch($method) {
                case 'GET':
                    $array['data'] = $users->getInfo($id);
                    if(count($array['data']) === 0) {
                        $array['error'] = 'Usuário não existe';
                    }
                    break;
                case 'PUT':
                    $array['error'] = $users->editInfo($id, $data);
                    break;
                case 'DELETE':
                    $array['error'] = $users->delete($id);
                    break;
                default:
                    $array['error'] = 'Método '.$method.' não disponível';
                    break;
            }
        } else {
            $array['error'] = 'Acesso negado!';
        }
        $this->returnJson($array);
    }

    // O feed será sempre a coleta do usuário que está logado, usando somente método GET
    public function feed()
    {
        $array = array('error'=>'', 'logged' => false);
        $method = $this->getMethod();
        $data = $this->getRequestData();
        $users = new Users();
        if(!empty($data['jwt']) && $users->validateJwt($data['jwt'])) {
            $array['logged'] = true;
            if($method == 'GET') {
                $offset = 0;
                if(!empty($data['offset'])) {
                    $offset = intval($data['offset']);
                }
                $per_page = 10;
                if(!empty($data['per_page'])) {
                    $per_page = intval($data['per_page']);
                }
                $array['data'] = $users->getFeed($offset, $per_page);
            } else{
                $array['error'] = 'Método '.$method.' não disponível';
            }
        } else {
            $array['error'] = 'Acesso negado!';
        }
        $this->returnJson($array);
    }

}