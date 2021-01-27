<?php
function route_requests($update) {
  if (isset($update->message->entities[0]) && $update->message->entities[0]->type == 'bot_command') {
    $update->parameters = array();
    $update->command[0] = substr($update->message->text, 0, $update->message->entities[0]->length);
    $update->parameters[0] = substr($update->message->text, $update->message->entities[0]->length+1);

    switch ($update->command[0]) {
      case ('/whoami'):
        whoami($update);
        break;

      case ('/echo'):
        echo_input($update);
        break;

      case ('/gethelp'):
        perform_help($update);
        break;

      default:
        bad_request($update);
        break;
    }
  } else {
    if (isset($update->message->reply_to_message)) {
      perform_reply($update);
    } else {
    perform_text($update);
    }
  }
}
