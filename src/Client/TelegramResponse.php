<?php

namespace Letrams\TelegramHelper\Client;

use Illuminate\Http\Client\Response;

class TelegramResponse extends Response
{
    public static function fromResponse(Response $response): TelegramResponse
    {
        return new self($response->toPsrResponse());
    }

    public function telegramOk(): bool
    {
        return parent::successful() && $this->json('ok');
    }

    public function telegramError(): bool
    {
        return !$this->telegraphOk();
    }

    public function telegramMessageId(): int|null
    {
        if (!$this->telegramOk()) {
            return null;
        }

        return (int)$this->json('result.message_id');
    }
}
