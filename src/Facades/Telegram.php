<?php

namespace Letrams\TelegramHelper\Facades;

use Illuminate\Support\Facades\Facade;

class Telegram extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'telegram';
    }
}
