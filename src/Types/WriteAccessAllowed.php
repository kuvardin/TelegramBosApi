<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Types;

use Kuvardin\TelegramBotsApi\Type;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding the bot to
 * the attachment menu or launching a Web App from a link.
 *
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class WriteAccessAllowed extends Type
{
    /**
     * @param string|null $web_app_name Name of the Web App which was launched from a link
     */
    public function __construct(
        public ?string $web_app_name = null,
    )
    {

    }

    public static function makeByArray(array $data): self
    {
        return new self(
            web_app_name: $data['web_app_name'] ?? null,
        );
    }

    public function getRequestData(): array
    {
        return [
            'web_app_name' => $this->web_app_name,
        ];
    }
}
