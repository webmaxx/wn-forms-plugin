<?php namespace Webmaxx\Forms\NotifyRules;

use Winter\Notify\Classes\ConditionBase;

class FormCodeCondition extends ConditionBase
{
    public function getConditionType()
    {
        return ConditionBase::TYPE_LOCAL;
    }

    public function defineFormFields()
    {
        return 'fields.yaml';
    }

    public function getName()
    {
        return trans('webmaxx.forms::lang.notify.conditions.form_code.name');
    }

    public function getTitle()
    {
        return trans('webmaxx.forms::lang.notify.conditions.form_code.title');
    }

    public function getText()
    {
        return trans('webmaxx.forms::lang.notify.conditions.form_code.text', [
            'code' => $this->host->code,
        ]);
    }

    public function isTrue(&$params)
    {
        return $this->host->code == data_get($params, 'code');
    }
}
