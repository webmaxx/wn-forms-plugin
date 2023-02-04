<?php namespace Webmaxx\Forms\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Forms Backend Controller
 */
class Forms extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Webmaxx.Forms', 'forms', 'forms');
    }
}
