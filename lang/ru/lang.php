<?php

return [
    'plugin' => [
        'name' => 'wmForms',
        'description' => 'Формы и сообщения, отправленные через них',
    ],
    'permissions' => [
        'feedbacks_access' => 'Доступ к сообщениям обратной связи',
    ],
    'navigation' => [
        'forms' => [
            'label' => 'Формы',
            'sidemenu' => [
                'feedbacks' => 'Обратная связь',
            ],
        ],
    ],
    'models' => [
        'feedback' => [
            'label' => 'Обратная связь',
            'list' => [
                'title' => 'Обратная связь',
                'filters' => [
                    'id' => 'ID',
                    'code' => 'Код формы',
                    'created_at' => 'Дата создания',
                ],
                'columns' => [
                    'id' => [
                        'label' => 'ID',
                    ],
                    'code' => [
                        'label' => 'Код формы',
                    ],
                    'name' => [
                        'label' => 'Имя',
                    ],
                    'phone' => [
                        'label' => 'Телефон',
                    ],
                    'email' => [
                        'label' => 'E-mail',
                    ],
                    'created_at' => [
                        'label' => 'Дата создания',
                    ],
                    'page' => [
                        'label' => 'Страница',
                    ],
                    'is_new' => [
                        'label' => 'new',
                    ],
                ],
            ],
            'form' => [
                'create' => [
                    'title' => 'Добавление',
                ],
                'update' => [
                    'title' => 'Редактирование',
                ],
                'preview' => [
                    'title' => 'Просмотр',
                ],
                'tabs' => [],
                'fields' => [
                    'id' => [
                        'label' => 'ID заявки',
                    ],
                    'code' => [
                        'label' => 'Код формы',
                    ],
                    'page' => [
                        'label' => 'Страница',
                    ],
                    '_data' => [
                        'label' => 'Данные формы',
                    ],
                    'name' => [
                        'label' => 'Имя',
                    ],
                    'phone' => [
                        'label' => 'Телефон',
                    ],
                    'email' => [
                        'label' => 'E-mail',
                    ],
                    'comment' => [
                        'label' => 'Сообщение',
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'feedback' => [
            'name' => 'Обратная связь',
            'description' => 'Отображение формы обратной связи',
            'property_groups' => [
                'name' => 'Имя',
                'phone' => 'Телефон',
                'email' => 'E-mail',
                'comment' => 'Комментарий',
            ],
            'properties' => [
                'code' => [
                    'title' => 'Код формы',
                    'description' => 'Для идентификации формы в списке заявок и возможности фильтрации в уведомлениях',
                ],
                'use_field' => [
                    'title' => 'Отображать',
                    'description' => '',
                ],
                'field_required' => [
                    'title' => 'Обязательно для заполнения',
                    'description' => '',
                ],
                'field_error_message' => [
                    'title' => 'Сообщение об ошибке',
                    'description' => '',
                ],
                'field_error_format_message' => [
                    'title' => 'Сообщение об ошибке формата',
                    'description' => '',
                ],
                'field_custom_rules' => [
                    'title' => 'Правила валидации',
                    'description' => 'Пользовательские правила валидации в формате "Правило - Сообщение об ошибке"',
                ],
                'success_message' => [
                    'title' => 'Сообщение об отправке формы',
                    'description' => '',
                ],
            ],
        ],
    ],
    'notify' => [
        'events' => [
            'feedback_form_sent' => [
                'name' => 'Обратная связь',
                'description' => 'Отправлена форма обратной связи',
                'params' => [
                    'id' => [
                        'title' => 'ID',
                        'label' => 'ID заявки',
                    ],
                    'code' => [
                        'title' => 'Код формы',
                        'label' => 'Код отправленной формы',
                    ],
                    'name' => [
                        'title' => 'Имя',
                        'label' => 'Значение поля \'Имя\'',
                    ],
                    'phone' => [
                        'title' => 'Телефон',
                        'label' => 'Значение поля \'Телефон\'',
                    ],
                    'email' => [
                        'title' => 'E-mail',
                        'label' => 'Значение поля \'E-mail\'',
                    ],
                    'comment' => [
                        'title' => 'Комментарий',
                        'label' => 'Значение поля \'Комментарий\'',
                    ],
                    'page' => [
                        'title' => 'Страница',
                        'label' => 'URL-адрес страницы, с которой отправили заявку',
                    ],
                ],
            ],
        ],
        'conditions' => [
            'form_code' => [
                'name' => '[Формы] Код формы',
                'title' => '[Формы] Код формы',
                'text' => 'Код формы: :code',
                'fields' => [
                    'code' => 'Код формы',
                ],
            ],
            'feedback_form_attribute' => [
                'grouping_title' => '[Формы] Обратная связь',
                'title' => 'Проверка поля',
                'attributes' => [
                    'code' => 'Код формы',
                    'name' => 'Имя',
                    'phone' => 'Телефон',
                    'email' => 'E-mail',
                    'page' => 'Страница',
                ],
            ],
        ],
        'actions' => [],
    ],
];
