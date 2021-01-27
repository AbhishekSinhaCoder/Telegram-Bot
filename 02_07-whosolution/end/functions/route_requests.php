<?php
function route_requests($update) {
  switch ($update->message->text) {
    case ('/whoami'):
      whoami($update);
      break;

    case ('/echo'):
      echo_input($update);
      break;

    default:
      bad_request($update);
      break;
  }
}
