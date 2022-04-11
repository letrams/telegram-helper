<?php

namespace Letrams\TelegramHelper;

use Letrams\TelegramHelper\Concerns\ComposesMessages;
use Letrams\TelegramHelper\Concerns\InteractsWithTelegram;
use Letrams\TelegramHelper\Concerns\ManagesKeyboards;

use Letrams\TelegramHelper\Client\TelegramResponse;

class Telegram
{
    use ComposesMessages;
    use InteractsWithTelegram;
    use ManagesKeyboards;

    public const PARSE_HTML = 'html';
    public const PARSE_MARKDOWN = 'markdown';

    public const ENDPOINT_GET_BOT_UPDATES = 'getUpdates';
    public const ENDPOINT_GET_BOT_INFO = 'getMe';
    public const ENDPOINT_REGISTER_BOT_COMMANDS = 'setMyCommands';
    public const ENDPOINT_UNREGISTER_BOT_COMMANDS = 'deleteMyCommands';
    public const ENDPOINT_SET_WEBHOOK = 'setWebhook';
    public const ENDPOINT_GET_WEBHOOK_DEBUG_INFO = 'getWebhookInfo';
    public const ENDPOINT_ANSWER_WEBHOOK = 'answerCallbackQuery';
    public const ENDPOINT_REPLACE_KEYBOARD = 'editMessageReplyMarkup';
    public const ENDPOINT_MESSAGE = 'sendMessage';
    public const ENDPOINT_DELETE_MESSAGE = 'deleteMessage';
    public const ENDPOINT_EDIT_MESSAGE = 'editMessageText';
    public const ENDPOINT_SEND_CHAT_ACTION = 'sendChatAction';

    /** @var array<string, mixed> */
    protected array $data = [];
    protected string $telegram_api_base_url;
    protected $telegram_api_token;

    public function __construct()
    {
        $this->telegram_api_base_url = config('telegram.TELEGRAM_API_BASE_URL');
    }

    public function send(): TelegramResponse
    {
        $response = $this->sendRequestToTelegram();

        return TelegramResponse::fromResponse($response);
    }
}
