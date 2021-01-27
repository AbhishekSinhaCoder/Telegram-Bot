<?php
function start_text($update) {
  $update->method[0] = 'sendPhoto';
  $update->post_fields[0]->chat_id = $update->message->chat->id;
  $update->post_fields[0]->photo = COMPANY_LOGO;
  help_text($update);
}
