<?php namespace Webmaxx\Forms\NotifyRules;

class FeedbackFormSentNotifyEvent extends \Winter\Notify\Classes\EventBase
{
    public $conditions = [
        FormCodeCondition::class,
        FeedbackFormAttributeCondition::class,
    ];

    public function eventDetails()
    {
        return [
            'name'        => 'webmaxx.forms::lang.notify.events.feedback_form_sent.name',
            'description' => 'webmaxx.forms::lang.notify.events.feedback_form_sent.name',
            'group'       => 'webmaxx.forms'
        ];
    }

    public function defineParams()
    {
        return [
            'id' => [
                'title' => 'webmaxx.forms::lang.notify.events.feedback_form_sent.params.id.title',
                'label' => trans('webmaxx.forms::lang.notify.events.feedback_form_sent.params.id.label'),
            ],
            'code' => [
                'title' => 'webmaxx.forms::lang.notify.events.feedback_form_sent.params.code.title',
                'label' => trans('webmaxx.forms::lang.notify.events.feedback_form_sent.params.code.label'),
            ],
            'name' => [
                'title' => 'webmaxx.forms::lang.notify.events.feedback_form_sent.params.name.title',
                'label' => trans('webmaxx.forms::lang.notify.events.feedback_form_sent.params.name.label'),
            ],
            'phone' => [
                'title' => 'webmaxx.forms::lang.notify.events.feedback_form_sent.params.phone.title',
                'label' => trans('webmaxx.forms::lang.notify.events.feedback_form_sent.params.phone.label'),
            ],
            'email' => [
                'title' => 'webmaxx.forms::lang.notify.events.feedback_form_sent.params.email.title',
                'label' => trans('webmaxx.forms::lang.notify.events.feedback_form_sent.params.email.label'),
            ],
            'comment' => [
                'title' => 'webmaxx.forms::lang.notify.events.feedback_form_sent.params.comment.title',
                'label' => trans('webmaxx.forms::lang.notify.events.feedback_form_sent.params.comment.label'),
            ],
            'page' => [
                'title' => 'webmaxx.forms::lang.notify.events.feedback_form_sent.params.page.title',
                'label' => trans('webmaxx.forms::lang.notify.events.feedback_form_sent.params.page.label'),
            ],
        ];
    }

    public static function makeParamsFromEvent(array $args, $eventName = null)
    {
        $record = array_get($args, 0);

        return [
            'record'  => $record,
            'id'      => $record->id,
            'code'    => $record->code,
            'name'    => $record->name,
            'phone'   => $record->phone,
            'email'   => $record->email,
            'comment' => $record->comment,
            'page'    => $record->page,
        ];
    }
}
