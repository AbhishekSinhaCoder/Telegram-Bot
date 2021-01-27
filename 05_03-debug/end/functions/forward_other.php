<?php
function forward_other($update) {
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->callback_query->message->chat->id;
  $update->post_fields[0]->text = 'Please describe your problem and I\'ll forward your message.';
  $update->post_fields[0]->reply_markup = json_encode(array(
    'force_reply' => TRUE,
  ));

  $update->post_fields[1] = new \stdClass();
  $update->method[1] = 'answerCallbackQuery';
  $update->post_fields[1]->callback_query_id = $update->callback_query->id;
}
