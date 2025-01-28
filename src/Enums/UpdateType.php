<?php

declare(strict_types=1);

namespace Kuvardin\TelegramBotsApi\Enums;

/**
 * @package Kuvardin\TelegramBotsApi
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
enum UpdateType: string
{
    case Message = 'message';
    case EditedMessage = 'edited_message';
    case ChannelPost = 'channel_post';
    case EditedChannelPost = 'edited_channel_post';
    case BusinessConnection = 'business_connection';
    case BusinessMessage = 'business_message';
    case EditedBusinessMessage = 'edited_business_message';
    case DeletedBusinessMessages = 'deleted_business_messages';
    case MessageReaction = 'message_reaction';
    case MessageReactionCount = 'message_reaction_count';
    case InlineQuery = 'inline_query';
    case ChosenInlineResult = 'chosen_inline_result';
    case CallbackQuery = 'callback_query';
    case ShippingQuery = 'shipping_query';
    case PreCheckoutQuery = 'pre_checkout_query';
    case Poll = 'poll';
    case PollAnswer = 'poll_answer';
    case MyChatMember = 'my_chat_member';
    case ChatMember = 'chat_member';
    case ChatJoinRequest = 'chat_join_request';
    case ChatBoost = 'chat_boost';
    case RemovedChatBoost = 'removed_chat_boost';
    case PurchasedPaidMedia = 'purchased_paid_media';
}