<?php
function echo_input($update) {
  // Using the Telegram Bot API method "sendMessage",
  // https://core.telegram.org/bots/api#sendmessage
  $update->method[0] = 'sendMessage';

  // It's going back to the same chat where it came from
  $update->post_fields[0]->chat_id = $update->message->chat->id;

  // The text being returned is just the whole object
  $update->post_fields[0]->text = $update->parameters[0];
}
