<?php
function perform_text($update) {
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->message->chat->id;
  $update->post_fields[0]->text = print_r($update, TRUE);
}
