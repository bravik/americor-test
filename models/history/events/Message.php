<?php

declare(strict_types=1);

namespace app\models\history\events;

use Webmozart\Assert\Assert;

/**
 * Represents translated message: template with placeholders and placeholder params
 */
final class Message
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var array<string>
     */
    private $params;

    public function __construct(string $template, array $params = [])
    {
        Assert::stringNotEmpty($template);

        $this->key = $template;
        $this->params   = $params;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}