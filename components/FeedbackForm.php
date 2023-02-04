<?php namespace Webmaxx\Forms\Components;

use Event;
use Flash;
use Input;
use Validator;
use Cms\Classes\ComponentBase;
use Webmaxx\Forms\Models\Feedback;
use Winter\Storm\Exception\ValidationException;

class FeedbackForm extends ComponentBase
{
    public $code;

    public $fields = [
        'name' => [
            'use' => true,
            'required' => true,
            'errorMessage' => '',
            'rules' => [],
        ],
        'phone' => [
            'use' => true,
            'required' => true,
            'errorMessage' => '',
            'rules' => [],
        ],
        'email' => [
            'use' => true,
            'required' => true,
            'errorMessage' => '',
            'errorFormatMessage' => '',
            'rules' => [],
        ],
        'comment' => [
            'use' => true,
            'required' => true,
            'errorMessage' => '',
            'rules' => [],
        ],
    ];

    public $successMessage = 'Your message has been successfully sent';

    protected $rules = [];

    protected $messages = [];

    /**
     * Gets the details for the component
     */
    public function componentDetails()
    {
        return [
            'name'        => 'webmaxx.forms::lang.components.feedback.name',
            'description' => 'webmaxx.forms::lang.components.feedback.description'
        ];
    }

    /**
     * Returns the properties provided by the component
     */
    public function defineProperties()
    {
        return [
            'code' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.code.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.code.description',
                'type'              => 'string',
                'required'          => true,
            ],

            'useName' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.use_field.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.use_field.description',
                'default'           => data_get($this->fields, 'name.use'),
                'type'              => 'checkbox',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.name',
            ],
            'nameRequired' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_required.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_required.description',
                'default'           => data_get($this->fields, 'name.use'),
                'type'              => 'checkbox',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.name',
            ],
            'nameErrorMessage' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_error_message.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_error_message.description',
                'default'           => data_get($this->fields, 'name.errorMessage'),
                'type'              => 'string',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.name',
            ],
            'nameCustomRules' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_custom_rules.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_custom_rules.description',
                'type'              => 'dictionary',
                'default'           => data_get($this->fields, 'name.rules'),
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.name',
            ],

            'usePhone' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.use_field.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.use_field.description',
                'default'           => data_get($this->fields, 'phone.use'),
                'type'              => 'checkbox',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.phone',
            ],
            'phoneRequired' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_required.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_required.description',
                'default'           => data_get($this->fields, 'phone.required'),
                'type'              => 'checkbox',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.phone',
            ],
            'phoneErrorMessage' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_error_message.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_error_message.description',
                'default'           => data_get($this->fields, 'phone.errorMessage'),
                'type'              => 'string',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.phone',
            ],
            'phoneCustomRules' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_custom_rules.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_custom_rules.description',
                'type'              => 'dictionary',
                'default'           => data_get($this->fields, 'phone.rules'),
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.phone',
            ],

            'useEmail' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.use_field.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.use_field.description',
                'default'           => data_get($this->fields, 'email.use'),
                'type'              => 'checkbox',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.email',
            ],
            'emailRequired' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_required.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_required.description',
                'default'           => data_get($this->fields, 'email.required'),
                'type'              => 'checkbox',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.email',
            ],
            'emailErrorMessage' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_error_message.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_error_message.description',
                'default'           => data_get($this->fields, 'email.errorMessage'),
                'type'              => 'string',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.email',
            ],
            'emailErrorFormatMessage' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_error_format_message.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_error_format_message.description',
                'default'           => data_get($this->fields, 'email.errorFormatMessage'),
                'type'              => 'string',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.email',
            ],
            'emailCustomRules' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_custom_rules.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_custom_rules.description',
                'type'              => 'dictionary',
                'default'           => data_get($this->fields, 'email.rules'),
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.email',
            ],

            'useComment' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.use_field.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.use_field.description',
                'default'           => data_get($this->fields, 'comment.use'),
                'type'              => 'checkbox',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.comment',
            ],
            'commentRequired' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_required.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_required.description',
                'default'           => data_get($this->fields, 'comment.required'),
                'type'              => 'checkbox',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.comment',
            ],
            'commentErrorMessage' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_error_message.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_error_message.description',
                'default'           => data_get($this->fields, 'comment.errorMessage'),
                'type'              => 'string',
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.comment',
            ],
            'commentCustomRules' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.field_custom_rules.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.field_custom_rules.description',
                'type'              => 'dictionary',
                'default'           => data_get($this->fields, 'comment.rules'),
                'group'             => 'webmaxx.forms::lang.components.feedback.property_groups.comment',
            ],
            'successMessage' => [
                'title'             => 'webmaxx.forms::lang.components.feedback.properties.success_message.title',
                'description'       => 'webmaxx.forms::lang.components.feedback.properties.success_message.description',
                'type'              => 'text',
                'default'           => $this->successMessage,
            ],
        ];
    }

    public function onRun()
    {
        $this->loadProperties();
    }

    public function onSubmitFeedbackForm()
    {
        $this->loadProperties();
        $this->loadValidationRules();

        $validator = Validator::make(Input::all(), $this->rules, $this->messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $model = Feedback::create(array_merge($validator->validated(), [
            'code' => $this->code,
            'page' => request()->fullUrl(),
        ]));

        Event::fire('webmaxx.forms:feedback.sent', [$model]);

        Flash::success(nl2br($this->successMessage));
    }

    protected function loadProperties()
    {
        $this->code = $this->property('code');
        $this->successMessage = $this->property('successMessage');

        $this->fields = [
            'name' => [
                'use' => $this->property('useName'),
                'required' => $this->property('nameRequired'),
                'errorMessage' => $this->property('nameErrorMessage'),
                'rules' => $this->property('nameCustomRules'),
            ],
            'phone' => [
                'use' => $this->property('usePhone'),
                'required' => $this->property('phoneRequired'),
                'errorMessage' => $this->property('phoneErrorMessage'),
                'rules' => $this->property('phoneCustomRules'),
            ],
            'email' => [
                'use' => $this->property('useEmail'),
                'required' => $this->property('emailRequired'),
                'errorMessage' => $this->property('emailErrorMessage'),
                'errorFormatMessage' => $this->property('emailErrorFormatMessage'),
                'rules' => $this->property('emailCustomRules'),
            ],
            'comment' => [
                'use' => $this->property('useComment'),
                'required' => $this->property('commentRequired'),
                'errorMessage' => $this->property('commentErrorMessage'),
                'rules' => $this->property('commentCustomRules'),
            ],
        ];
    }

    protected function loadValidationRules()
    {
        $this->rules = [];

        foreach (['name', 'phone', 'email', 'comment'] as $field) {
            if (data_get($this->fields, "{$field}.use")) {
                if (data_get($this->fields, "{$field}.required")) {
                    $this->rules[$field][] = 'required';

                    if ($errorMessage = data_get($this->fields, "{$field}.errorMessage")) {
                        $this->messages["{$field}.required"] = $errorMessage;
                    }
                }

                foreach (data_get($this->fields, "{$field}.rules", []) as $rule => $message) {
                    $ruleName = explode(':', $rule)[0];

                    $this->rules[$field][] = $rule;

                    if ($message) {
                        $this->messages["{$field}.{$ruleName}"] = $message;
                    }
                }

                if ($field == 'email') {
                    $this->rules[$field][] = 'email';

                    if ($emailErrorFormatMessage = data_get($this->fields, "{$field}.errorFormatMessage")) {
                        $this->messages["{$field}.email"] = $emailErrorFormatMessage;
                    }
                }
            }
        }
    }
}
