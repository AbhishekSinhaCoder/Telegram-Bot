<?php
function help_text($update) {
  if (isset($update->method[0])) {
    $i = 1;
    $update->post_fields[1] = new \stdClass();
  } else {
    $i = 0;
  }

  $update->method[$i] = 'sendMessage';
  $update->post_fields[$i]->chat_id = $update->message->chat->id;
  $update->post_fields[$i]->text =
  "
  <b>Welcome to the Kineteco help bot!</b> Commands are:
  /gethelp - Get billing and tech FAQs, or connect to Customer Service
  /help - Get this help text
  /whoami - Get your own Telegram identity (could help us to help you)
  ";
  $update->post_fields[$i]->parse_mode = 'HTML';
}
