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
        forward_other($update);
        break;
      default:
        $update->post_fields[0]->text = "I didn't understand that.";
        break;
    }
    break;

    case ('Please describe your problem and I\'ll forward your message.'):
      $update->post_fields[0]->chat_id = CUSTOMER_SERVICE_ID;
      $update->post_fields[0]->text =
        "You received the following question:\n\n" .
        $update->message->text .
        "\n\nIt was sent by\n\n" .
        print_r($update->message->from, TRUE);
      break;
  }
}
