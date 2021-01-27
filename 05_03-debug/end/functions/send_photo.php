<?php
function send_photo($update) {
  $update->method[0] = 'sendPhoto';
  $update->post_fields[0]->chat_id = $update->message->chat->id;
  $update->post_fields[0]->photo = COMPANY_LOGO;
  $update->post_fields[0]->caption = 'KinetEco\'s logo';
}
