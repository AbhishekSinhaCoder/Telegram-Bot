<?php
function whoami($update) {
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->message->chat->id;

  $firstname = $update->message->from->first_name;
  $lastname = $update->message->from->last_name;
  $username = $update->message->from->username;
  $user_id = $update->message->from->id;

  $update->post_fields[0]->text = "Hello, $firstname $lastname!\nYour username is $username and your user ID is $user_id.";
}
