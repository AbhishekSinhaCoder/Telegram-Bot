<?php
function perform_reply($update) {
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->message->chat->id;
  switch ($update->message->reply_to_message->text) {
    case ('Please describe your problem and I\'ll forward your message.'):
      finish_reply($update);
      break;
  }
}
