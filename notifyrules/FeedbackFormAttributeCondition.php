<?php namespace Webmaxx\Forms\NotifyRules;

use Webmaxx\Forms\Models\Feedback;
use Winter\Notify\Classes\ModelAttributesConditionBase;
use Winter\Storm\Exception\ApplicationException;

class FeedbackFormAttributeCondition extends ModelAttributesConditionBase
{
    protected $modelClass = Feedback::class;

    public function getGroupingTitle()
    {
        return trans('webmaxx.forms::lang.notify.conditions.feedback_form_attribute.grouping_title');
    }

    public function getTitle()
    {
        return trans('webmaxx.forms::lang.notify.conditions.feedback_form_attribute.title');
    }

    public function isTrue(&$params)
    {
        // $hostObj = $this->host;
        // $attribute = $hostObj->subcondition;

        if (!$record = array_get($params, 'record')) {
            throw new ApplicationException('Error evaluating the user attribute condition: the record object is not found in the condition parameters.');
        }

        return parent::evalIsTrue($record);
    }

    protected function listModelAttributeInfo()
    {
        parent::listModelAttributeInfo();

        foreach ($this->modelAttributes as $attribute => $info) {
            if ($label = data_get($info, 'label')) {
                $this->modelAttributes[$attribute]['label'] = trans($label);
            }
        }

        return $this->modelAttributes;
    }
}
