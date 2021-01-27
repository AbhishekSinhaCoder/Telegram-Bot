<?php
function bad_request($update) {
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->message->chat->id;
  $update->post_fields[0]->text = 'You wrote "' . $update->message->text . '". I don\'t understand that.';
  $update->post_fields[0]->disable_web_page_preview = TRUE;
}
