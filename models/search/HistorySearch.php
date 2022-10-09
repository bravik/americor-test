<?php

namespace app\models\search;

use DateTimeImmutable;
use yii\base\Model;

/**
 * @property string $from
 * @property string $till
 */
class HistorySearch extends Model
{
    private $from;
    private $till;

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['from', 'till'], 'safe'],
            [['from', 'till'], 'datetime'],
        ];
    }

    /**
     * @return ?DateTimeImmutable
     */
    public function getFrom()
    {
        return $this->from ? new DateTimeImmutable($this->from) : null;
    }

    /**
     * @return ?DateTimeImmutable
     */
    public function getTill()
    {
        return $this->till ? new DateTimeImmutable($this->till) : null;
    }
}
