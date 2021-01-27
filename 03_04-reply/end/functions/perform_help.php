<?php
function perform_help($update) {
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->message->chat->id;
  $update->post_fields[0]->text = 'What kind of help would you like? Type "tech", "billing", or "other".';
  $update->post_fields[0]->reply_markup = json_encode(array(
    'force_reply' => TRUE,
  ));
}
