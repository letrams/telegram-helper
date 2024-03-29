<?php

namespace Letrams\TelegramHelper\Concerns;

use Letrams\TelegramHelper\Telegram;

trait ComposesMessages
{
    private $chat_id;

    public function chat($chat_id): Telegram
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function setBot($bot_token): Telegram
    {
        $this->telegram_api_token = $bot_token;

        return $this;
    }

    public function html(string $message): Telegram
    {
        $this->endpoint ??= self::ENDPOINT_MESSAGE;
        $this->data['text'] = $message;
        $this->data['chat_id'] = $this->chat_id;
        $this->data['parse_mode'] = 'html';

        return $this;
    }

    public function markdown(string $message): Telegram
    {
        $this->endpoint ??= self::ENDPOINT_MESSAGE;
        $this->data['text'] = $message;
        $this->data['chat_id'] = $this->getChat()->chat_id;
        $this->data['parse_mode'] = 'markdown';

        return $this;
    }

    public function reply(int $messageId): Telegram
    {
        $this->data['reply_to_message_id'] = $messageId;

        return $this;
    }

    public function protected(): Telegram
    {
        $this->data['protect_content'] = true;

        return $this;
    }

    public function silent(): Telegram
    {
        $this->data['disable_notification'] = true;

        return $this;
    }

    public function withoutPreview(): Telegram
    {
        $this->data['disable_web_page_preview'] = true;

        return $this;
    }

    public function deleteMessage(int $messageId): Telegram
    {
        $this->endpoint = self::ENDPOINT_DELETE_MESSAGE;
        $this->data = [
            'chat_id' => $this->chat_id,
            'message_id' => $messageId,
        ];

        return $this;
    }

    public function edit(int $messageId): Telegram
    {
        $this->endpoint = self::ENDPOINT_EDIT_MESSAGE;
        $this->data['message_id'] = $messageId;

        return $this;
    }
}
