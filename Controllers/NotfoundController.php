<?php
namespace Controllers;

use \Core\Controller;

class NotfoundController extends Controller
{
    public function index() {
        $this->returnJson(array('erro'=>'action nao encontrada, verifique o endpoint'));
    }
}