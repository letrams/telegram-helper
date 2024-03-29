**laravel-helper** создан как легкий плагин по работе с Telegram

```php
use Letrams\TelegramHelper\Facades\Telegram;

Telegram::chat(USER_ID)
    ->html('test')
    ->send()
```

```php
->setBot(TELEGRAM_TOKEN) //Задать бота в класе
```

Пример, как вместо отправки запроса получить массив

```php

Telegram::chat('169473819')->html('test')->toArray();

```

Пример с клавиатурой

```php
Telegram::message('hello')
    ->keyboard(Keyboard::make()->buttons([
            Button::make('Delete')->action('update')->param('id', '13'),
            Button::make('open')->url('https://laravel.test'),
    ]))->send();
```

Описание методов

```php
->html('test') //вид сообщение - html
->markdown('test') // вид сообщение - markdown

->send() // отправить в ТГ
->keyboard() // создание inline клавиатуры
->toArray() // вместо отправки в тг вернуть массив
->params(["reply_markup" => ['keyboard' => [['q']]]]) // внедрение дополнительных параметров в запросов

->reply() // Ответить на сообщение
->protected() // Запретить пересылку
->silent() // Отправить без звука
->withoutPreview() // без превью

->deleteMessage() // Удалить сообщение
->edit() // Редактировать
```

## Installation

Т.к. пакет еще не готов, а значит не подключен к packagist, поэтому установка без композера

You can install the package without composer:

Скопировать код в папку проекта

```bash
packages/telegram-helper
```

в composer.phar добавить

```bash
"require": {
        "letrams/laravel-helper": "*"
    },
```

```bash
    "repositories": [
        {
            "type": "path",
            "url": "./packages/telegram-helper"
        }
    ],
```

Запустить публикацию конфига в проект:

```bash
php artisan vendor:publish --tag="telegram-config"
```
