<?php
function perform_text($update) {
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->message->chat->id;

  switch ($update->message->text) {
    default:
      bad_request($update);
      break;
  }
}
