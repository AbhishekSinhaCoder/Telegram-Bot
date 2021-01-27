<?php
function perform_reply($update) {
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->message->chat->id;
  switch ($update->message->reply_to_message->text) {
    case ('What kind of help would you like? Type "tech", "billing", or "other".'):
    switch ($update->message->text) {
      case 'tech':
        $update->post_fields[0]->text = "Tech info here.";
        break;
      case 'billing':
        $update->post_fields[0]->text = "Billing info here.";
        break;
      case 'other':
        $update->post_fields[0]->text = "I'll forward your message.";
        break;
      default:
        $update->post_fields[0]->text = "I didn't understand that.";
        break;
    }
    break;
  }
}
