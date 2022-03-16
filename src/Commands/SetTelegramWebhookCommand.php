<?php

namespace Letrams\TelegramHelper\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SetTelegramWebhookCommand extends Command
{

    public $signature = 'telegram:set-webhook';

    public $description = 'Set webhook url in telegram bot';

    public function handle(): int
    {
        $url = (string)Str::of(config('telegram.TELEGRAM_API_BASE_URL'))
            ->append(config('telegram.TOKEN'))
            ->append('/setWebhook');

        $response_json = Http::post($url, [
            'url' => route(config('telegram.TELEGRAM_WEBHOOK_URL')),
        ]);

        $response = json_decode($response_json->body());

        $this->comment('new url webhook: ' . route('telegram.webhook'));

        if ($response->ok)
            $this->info('Webhook updated');

        if (!$response->ok)
            $this->warn('Webhook not updated');

        return self::SUCCESS;
    }
}
