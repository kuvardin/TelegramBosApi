<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Types\InlineQueryResult;

use JetBrains\PhpStorm\Deprecated;
use Kuvardin\TelegramBotsApi\Types\InlineKeyboardMarkup;
use Kuvardin\TelegramBotsApi\Types\InlineQueryResult;
use Kuvardin\TelegramBotsApi\Types\InputMessageContent;
use RuntimeException;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use
 * "input_message_content" to send a message with the specified content instead of the location.
 *
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Location extends InlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param float $latitude Location latitude in degrees
     * @param float $longitude Location longitude in degrees
     * @param string $title Location title
     * @param float|null $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|null $live_period Period in seconds during which the location can be updated, should be between 60
     *     and 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely.
     * @param int|null $heading For live locations, a direction in which the user is moving, in degrees. Must be
     *     between 1 and 360 if specified.
     * @param int|null $proximity_alert_radius For live locations, a maximum distance for proximity alerts about
     *     approaching another chat member, in meters. Must be between 1 and 100000 if specified.
     * @param InlineKeyboardMarkup|null $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|null $input_message_content Content of the message to be sent instead of the location
     * @param string|null $thumbnail_url Url of the thumbnail for the result
     * @param int|null $thumbnail_width Thumbnail width
     * @param int|null $thumbnail_height Thumbnail height
     */
    public function __construct(
        public string $id,
        public float $latitude,
        public float $longitude,
        public string $title,
        public ?float $horizontal_accuracy = null,
        public ?int $live_period = null,
        public ?int $heading = null,
        public ?int $proximity_alert_radius = null,
        public ?InlineKeyboardMarkup $reply_markup = null,
        public ?InputMessageContent $input_message_content = null,
        public ?string $thumbnail_url = null,
        public ?int $thumbnail_width = null,
        public ?int $thumbnail_height = null,

        #[Deprecated] public ?string $thumb_url = null,
        #[Deprecated] public ?int $thumb_width = null,
        #[Deprecated] public ?int $thumb_height = null,
    )
    {
        $this->thumb_url ??= $this->thumbnail_url;
        $this->thumbnail_url ??= $this->thumb_url;

        $this->thumb_width ??= $this->thumbnail_width;
        $this->thumbnail_width ??= $this->thumb_width;

        $this->thumb_height ??= $this->thumbnail_height;
        $this->thumbnail_height ??= $this->thumb_height;
    }

    public static function getType(): string
    {
        return 'location';
    }

    public static function makeByArray(array $data): static
    {
        if ($data['type'] !== self::getType()) {
            throw new RuntimeException("Wrong inline query result type: {$data['type']}");
        }

        return new self(
            id: $data['id'],
            latitude: $data['latitude'],
            longitude: $data['longitude'],
            title: $data['title'],
            horizontal_accuracy: $data['horizontal_accuracy'] ?? null,
            live_period: $data['live_period'] ?? null,
            heading: $data['heading'] ?? null,
            proximity_alert_radius: $data['proximity_alert_radius'] ?? null,
            reply_markup: isset($data['reply_markup'])
                ? InlineKeyboardMarkup::makeByArray($data['reply_markup'])
                : null,
            input_message_content: isset($data['input_message_content'])
                ? InputMessageContent::makeByArray($data['input_message_content'])
                : null,
            thumbnail_url: $data['thumbnail_url'] ?? null,
            thumbnail_width: $data['thumbnail_width'] ?? null,
            thumbnail_height: $data['thumbnail_height'] ?? null,
        );
    }

    public function getRequestData(): array
    {
        return [
            'type' => self::getType(),
            'id' => $this->id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'horizontal_accuracy' => $this->horizontal_accuracy,
            'live_period' => $this->live_period,
            'heading' => $this->heading,
            'proximity_alert_radius' => $this->proximity_alert_radius,
            'reply_markup' => $this->reply_markup,
            'input_message_content' => $this->input_message_content,
            'thumbnail_url' => $this->thumbnail_url,
            'thumbnail_width' => $this->thumbnail_width,
            'thumbnail_height' => $this->thumbnail_height,
        ];
    }
}
