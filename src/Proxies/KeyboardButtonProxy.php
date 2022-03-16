<?php

namespace DefStudio\Telegraph\Proxies;

use Letrams\TelegramHelper\Keyboard\Button;
use Letrams\TelegramHelper\Keyboard\Keyboard;

class KeyboardButtonProxy extends Keyboard
{
    private Button $button;

    public function __construct(Keyboard $proxyed, Button $button)
    {
        parent::__construct();
        $this->button = $button;
        $this->buttons = $proxyed->buttons;
    }

    /**
     * @param array<array-key, mixed> $arguments
     */
    public function __call(string $name, array $arguments): KeyboardButtonProxy
    {
        $clone = $this->clone();

        $clone->button->$name(...$arguments);

        return $clone;
    }

    protected function clone(): KeyboardButtonProxy
    {
        return new self(parent::clone(), $this->button);
    }
}
