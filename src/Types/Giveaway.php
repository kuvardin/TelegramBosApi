<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Types;

use Kuvardin\TelegramBotsApi\Type;

/**
 * This object represents a message about a scheduled giveaway.
 *
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Giveaway extends Type
{
    /**
     * @param Chat[] $chats The list of chats which the user must join to participate in the giveaway
     * @param int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway will be selected
     * @param int $winner_count The number of users which are supposed to be selected as winners of the giveaway
     * @param bool|null $only_new_members "True", if only users who join the chats after the giveaway started should be
     *     eligible to win
     * @param bool|null $has_public_winners "True", if the list of giveaway winners will be visible to everyone
     * @param string|null $prize_description Description of additional giveaway prize
     * @param string[]|null $country_codes A list of two-letter ISO 3166-1 alpha-2 country codes indicating the
     *     countries from which eligible users for the giveaway must come. If empty, then all users can participate in
     *     the giveaway. Users with a phone number that was bought on Fragment can always participate in giveaways.
     * @param int|null $premium_subscription_month_count The number of months the Telegram Premium subscription won
     *     from the giveaway will be active for
     * @param int|null $prize_star_count The number of Telegram Stars to be split between giveaway winners;
     *     for Telegram Star giveaways only
     */
    public function __construct(
        public array $chats,
        public int $winners_selection_date,
        public int $winner_count,
        public ?bool $only_new_members = null,
        public ?bool $has_public_winners = null,
        public ?string $prize_description = null,
        public ?array $country_codes = null,
        public ?int $premium_subscription_month_count = null,
        public ?int $prize_star_count = null,
    )
    {

    }

    public static function makeByArray(array $data): self
    {
        return new self(
            chats: array_map(
                static fn(array $chats_data) => Chat::makeByArray($chats_data),
                $data['chats'],
            ),
            winners_selection_date: $data['winners_selection_date'],
            winner_count: $data['winner_count'],
            only_new_members: $data['only_new_members'] ?? null,
            has_public_winners: $data['has_public_winners'] ?? null,
            prize_description: $data['prize_description'] ?? null,
            country_codes: $data['country_codes'] ?? null,
            premium_subscription_month_count: $data['premium_subscription_month_count'] ?? null,
            prize_star_count: $data['prize_star_count'] ?? null,
        );
    }

    public function getRequestData(): array
    {
        return [
            'chats' => $this->chats,
            'winners_selection_date' => $this->winners_selection_date,
            'winner_count' => $this->winner_count,
            'only_new_members' => $this->only_new_members,
            'has_public_winners' => $this->has_public_winners,
            'prize_description' => $this->prize_description,
            'country_codes' => $this->country_codes,
            'premium_subscription_month_count' => $this->premium_subscription_month_count,
            'prize_star_count' => $this->prize_star_count,
        ];
    }
}
