<?php namespace Webmaxx\Forms\Controllers;

use BackendMenu;

class Index extends \Backend\Classes\Controller
{

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Webmaxx.Forms', 'forms');
    }

    public function index()
    {
    }

}
