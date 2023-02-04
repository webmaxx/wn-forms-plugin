<?php

return [
    'plugin' => [
        'name' => 'wmForms',
        'description' => 'Forms and messages sent through them',
    ],
    'permissions' => [
        'feedbacks_access' => 'Access to feedback messages',
    ],
    'navigation' => [
        'forms' => [
            'label' => 'Forms',
            'sidemenu' => [
                'feedbacks' => 'Feedback',
            ],
        ],
    ],
    'models' => [
        'feedback' => [
            'label' => 'Feedback',
            'list' => [
                'title' => 'Feedback',
                'filters' => [
                    'id' => 'ID',
                    'code' => 'Form code',
                    'created_at' => 'Created at',
                ],
                'columns' => [
                    'id' => [
                        'label' => 'ID',
                    ],
                    'code' => [
                        'label' => 'Form code',
                    ],
                    'name' => [
                        'label' => 'Name',
                    ],
                    'phone' => [
                        'label' => 'Phone',
                    ],
                    'email' => [
                        'label' => 'E-mail',
                    ],
                    'created_at' => [
                        'label' => 'Created at',
                    ],
                    'page' => [
                        'label' => 'Page',
                    ],
                    'is_new' => [
                        'label' => 'new',
                    ],
                ],
            ],
            'form' => [
                'create' => [
                    'title' => 'Create',
                ],
                'update' => [
                    'title' => 'Update',
                ],
                'preview' => [
                    'title' => 'Preview',
                ],
                'tabs' => [],
                'fields' => [
                    'id' => [
                        'label' => 'Record ID',
                    ],
                    'code' => [
                        'label' => 'Form code',
                    ],
                    'page' => [
                        'label' => 'Page',
                    ],
                    '_data' => [
                        'label' => 'Form data',
                    ],
                    'name' => [
                        'label' => 'Name',
                    ],
                    'phone' => [
                        'label' => 'Phone',
                    ],
                    'email' => [
                        'label' => 'E-mail',
                    ],
                    'comment' => [
                        'label' => 'Comment',
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'feedback' => [
            'name' => 'Feedback',
            'description' => 'Displaying the feedback form',
            'property_groups' => [
                'name' => 'Name',
                'phone' => 'Phone',
                'email' => 'E-mail',
                'comment' => 'Comment',
            ],
            'properties' => [
                'code' => [
                    'title' => 'Form code',
                    'description' => 'To identify the form in the message list and the possibility of filtering in notifications',
                ],
                'use_field' => [
                    'title' => 'Display',
                    'description' => '',
                ],
                'field_required' => [
                    'title' => 'Required',
                    'description' => '',
                ],
                'field_error_message' => [
                    'title' => 'Error message',
                    'description' => '',
                ],
                'field_error_format_message' => [
                    'title' => 'Formatting error message',
                    'description' => '',
                ],
                'field_custom_rules' => [
                    'title' => 'Validation rules',
                    'description' => 'Custom validation rules in the "Rule - Error Message" format',
                ],
                'success_message' => [
                    'title' => 'Message about sending the form',
                    'description' => '',
                ],
            ],
        ],
    ],
    'notify' => [
        'events' => [
            'feedback_form_sent' => [
                'name' => 'Feedback',
                'description' => 'A feedback form has been sent',
                'params' => [
                    'id' => [
                        'title' => 'ID',
                        'label' => 'Record ID',
                    ],
                    'code' => [
                        'title' => 'Form code',
                        'label' => 'Code of the submitted form',
                    ],
                    'name' => [
                        'title' => 'Name',
                        'label' => 'Value of the \'Name\' field',
                    ],
                    'phone' => [
                        'title' => 'Phone',
                        'label' => 'Value of the \'Phone\' field',
                    ],
                    'email' => [
                        'title' => 'E-mail',
                        'label' => 'Value of the \'E-mail\' field',
                    ],
                    'comment' => [
                        'title' => 'Comment',
                        'label' => 'Value of the \'Comment\' field',
                    ],
                    'page' => [
                        'title' => 'Page',
                        'label' => 'URL of the page from which the request was sent',
                    ],
                ],
            ],
        ],
        'conditions' => [
            'form_code' => [
                'name' => '[Forms] Form code',
                'title' => '[Forms] Form code',
                'text' => 'Form code: :code',
                'fields' => [
                    'code' => 'Form code',
                ],
            ],
            'feedback_form_attribute' => [
                'grouping_title' => '[Forms] Feedback',
                'title' => 'Checking the field',
                'attributes' => [
                    'code' => 'Form code',
                    'name' => 'Name',
                    'phone' => 'Phone',
                    'email' => 'E-mail',
                    'page' => 'Page',
                ],
            ],
        ],
        'actions' => [],
    ],
];
