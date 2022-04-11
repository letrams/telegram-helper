<?php

namespace Letrams\TelegramHelper\Concerns;

use Letrams\TelegramHelper\Telegram;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/**
 * @mixin Telegram
 */
trait InteractsWithTelegram
{
    protected string $endpoint;

    protected function sendRequestToTelegram(): Response
    {
        return Http::post($this->getApiUrl(), $this->data);
    }

    public function getApiUrl(): string
    {
        return (string)Str::of($this->telegram_api_base_url)
            ->append($this->telegram_api_token)
            ->append('/', $this->endpoint);
    }

    /**
     * @return array{url:string, payload:array<string, mixed>}
     */
    public function toArray(): array
    {
        return [
            'url' => $this->getApiUrl(),
            'payload' => $this->data,
        ];
    }

    public function params($array): Telegram
    {
        $this->data = array_merge_recursive($this->data,$array);

        return $this;
    }
}
