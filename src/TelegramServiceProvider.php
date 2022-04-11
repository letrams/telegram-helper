<?php

namespace Letrams\TelegramHelper;

use Letrams\TelegramHelper\Commands\SetTelegramWebhookCommand;
use Letrams\TelegramHelper\Telegram;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TelegramServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('telegram')
            ->hasConfigFile('telegram')
            ->hasCommand(SetTelegramWebhookCommand::class);

        $this->app->bind('telegram', Telegram::class);
    }
}
