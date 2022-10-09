<?php

declare(strict_types=1);

namespace app\models\history\events\fax;

use app\models\Fax;
use app\models\history\events\AbstractEvent;

abstract class AbstractFaxEvent extends AbstractEvent
{
    /**
     * @return ?Fax
     */
    public function getFax()
    {
        return $this->historyRecord->fax;
    }

    public function getTemplate(): string
    {
        return '_item_fax';
    }
}