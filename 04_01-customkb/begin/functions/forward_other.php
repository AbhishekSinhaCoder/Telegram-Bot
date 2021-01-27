<?php
function forward_other($update) {
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->message->chat->id;
  $update->post_fields[0]->text = 'Please describe your problem and I\'ll forward your message.';
  $update->post_fields[0]->reply_markup = json_encode(array(
    'force_reply' => TRUE,
  ));
}
