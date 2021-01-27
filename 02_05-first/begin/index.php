<?php
// PHP example of a simple bot that spits a user's message back.

// Include functions
include_once 'constants.php';
include_once 'functions/echo_input.php';
include_once 'functions/send_response.php';

// Grab the JSON input stream from Telegram, convert it to an object
$update = json_decode(file_get_contents('php://input'));

// Initialize two variables used to respond to Telegram.
// (Arrays allow for multiple responses to be sent to Telegram.)
$update->method = array();
$update->post_fields = array();
// There will always be at least one response
$update->post_fields[0] = new \stdClass();

// Do the thing
echo_input($update);

// Send it all to Telegram's servers using HTTP POST
send_response($update);
