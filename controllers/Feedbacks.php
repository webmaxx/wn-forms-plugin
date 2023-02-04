<?php namespace Webmaxx\Forms\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Webmaxx\Forms\Models\Feedback;

/**
 * Feedbacks Backend Controller
 */
class Feedbacks extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public $requiredPermissions = ['webmaxx.forms.feedbacks_access'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Webmaxx.Forms', 'forms', 'feedbacks');
    }

    public function listInjectRowClass($record, $value)
    {
        if ($record->new) {
            return 'new';
        }
    }

    public function preview($recordId, $context = null)
    {
        Feedback::query()
            ->where('id', $recordId)
            ->update(['is_new' => false]);

        return $this->asExtension('FormController')->preview($recordId, $context);
    }
}
