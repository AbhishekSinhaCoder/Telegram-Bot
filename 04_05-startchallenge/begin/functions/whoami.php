<?php
function whoami($update) {
  // The response will be a Message sent to the same chat as the request
  $update->method[0] = 'sendMessage';
  $update->post_fields[0]->chat_id = $update->message->chat->id;

  // Pull out variables specific to the "whoami" function
  $firstname = $update->message->from->first_name;
  $lastname = $update->message->from->last_name;
  $username = $update->message->from->username;
  $user_id = $update->message->from->id;

  // Put the response together and send it as the POST's "text" parameter.
  $update->post_fields[0]->text = "Hello, $firstname $lastname!\nYour username is @$username and your user ID is $user_id.";
}
