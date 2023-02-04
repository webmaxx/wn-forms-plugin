<?php namespace Webmaxx\Forms;

use Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;
use Webmaxx\Forms\Models\Feedback;
use Webmaxx\Forms\NotifyRules\FeedbackFormAttributeCondition;
use Webmaxx\Forms\NotifyRules\FeedbackFormSentNotifyEvent;
use Webmaxx\Forms\NotifyRules\FormCodeCondition;
use Winter\Notify\Classes\Notifier;

/**
 * Forms Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = [
        // 'Winter.Notify', // Optional
    ];

    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'webmaxx.forms::lang.plugin.name',
            'description' => 'webmaxx.forms::lang.plugin.description',
            'author'      => 'Webmaxx',
            'homepage'    => 'https://github.com/webmaxx/wn-forms-plugin',
            'icon'        => 'icon-envelope'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {
        $this->bindNotificationEvents();
    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {

    }

    /**
     * Registers any frontend components implemented in this plugin.
     */
    public function registerComponents(): array
    {
        return [
            'Webmaxx\Forms\Components\FeedbackForm' => 'wmFeedbackForm',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return [
            // Feedbacks
            'webmaxx.forms.feedbacks_access' => [
                'tab' => 'webmaxx.forms::lang.plugin.name',
                'label' => 'webmaxx.forms::lang.permissions.feedbacks_access',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],

            // // Forms
            // 'webmaxx.forms.builder_access' => [
            //     'tab' => 'webmaxx.forms::lang.plugin.name',
            //     'label' => 'webmaxx.forms::lang.permissions.builder_access',
            //     'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            // ],

            // // Records
            // 'webmaxx.forms.records_access' => [
            //     'tab' => 'webmaxx.forms::lang.plugin.name',
            //     'label' => 'webmaxx.forms::lang.permissions.records_access',
            //     'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            // ],
        ];
    }

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
    {
        return [
            'forms' => [
                'label'       => 'webmaxx.forms::lang.navigation.forms.label',
                'url'         => Backend::url('webmaxx/forms'),
                'icon'        => 'icon-envelope',
                'permissions' => ['webmaxx.forms.*'],
                'order'       => 500,
                'sideMenu'    => [
                    'feedbacks' => [
                        'label' => 'webmaxx.forms::lang.navigation.forms.sidemenu.feedbacks',
                        'url'   => Backend::url('webmaxx/forms/feedbacks'),
                        'icon'  => 'icon-comment',
                        'permissions' => ['webmaxx.forms.feedbacks_access'],
                        'counter'     => [Feedback::class, 'getNewCount'],
                    ],
                    // 'builder' => [
                    //     'label' => 'webmaxx.forms::lang.navigation.forms.sidemenu.builder',
                    //     'url'   => Backend::url('webmaxx/forms/builder'),
                    //     'icon'  => 'icon-wrench',
                    //     'permissions' => ['webmaxx.forms.builder_access'],
                    // ],
                    // 'records' => [
                    //     'label' => 'webmaxx.forms::lang.navigation.forms.sidemenu.records',
                    //     'url'   => Backend::url('webmaxx/forms/records'),
                    //     'icon'  => 'icon-envelope',
                    //     'permissions' => ['webmaxx.forms.records_access'],
                    // ],
                ],
            ],
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'webmaxx.forms::mail.feedback' => '[Forms] Feedback',
        ];
    }

    public function registerNotificationRules()
    {
        return [
            'events' => [
                FeedbackFormSentNotifyEvent::class,
            ],
            'actions' => [],
            'conditions' => [
                FormCodeCondition::class,
                FeedbackFormAttributeCondition::class,
            ],
            'groups' => [
                'webmaxx.forms' => [
                    'label' => 'webmaxx.forms::lang.navigation.forms.label',
                    'icon' => 'icon-envelope'
                ],
            ],
        ];
    }

    protected function bindNotificationEvents()
    {
        if (!class_exists(Notifier::class)) {
            return;
        }

        Notifier::bindEvents([
            'webmaxx.forms:feedback.sent' => FeedbackFormSentNotifyEvent::class,
        ]);
    }
}
