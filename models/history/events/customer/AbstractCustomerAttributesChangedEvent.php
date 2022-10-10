<?php

declare(strict_types=1);

namespace app\models\history\events\customer;

use app\models\history\events\AbstractEvent;
use Webmozart\Assert\Assert;

abstract class AbstractCustomerAttributesChangedEvent extends AbstractEvent
{
    /**
     * @var string
     */
    protected $attribute;

    public function getTemplate(): string
    {
        return '_item_customer_changed_attribute';
    }

    public function getOldValue()
    {
        Assert::stringNotEmpty($this->attribute);
        return $this->historyRecord->getDetailOldValue($this->attribute);
    }

    public function getNewValue()
    {
        Assert::stringNotEmpty($this->attribute);
        return $this->historyRecord->getDetailNewValue($this->attribute);
    }
}