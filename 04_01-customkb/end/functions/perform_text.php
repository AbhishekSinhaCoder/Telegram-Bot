<?php
function perform_text($update) {
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->message->chat->id;

  switch ($update->message->text) {
    case 'tech':
      $update->post_fields[0]->text = "Tech info here.";
      break;
    case 'billing':
      $update->post_fields[0]->text = "Billing info here.";
      break;
    case 'other':
      forward_other($update);
      break;
    default:
      $update->post_fields[0]->text = "I didn't understand that.";
      break;
  }
}
