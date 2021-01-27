<?php
// PHP example of long polling that returns only the latest update.

// constants.php contains $bot_token: Stored in a separate file for security
include_once 'constants.php';

// The URL where the bot sends responses
$url = "https://api.telegram.org/bot" . BOT_TOKEN . "/";
// Start the counter mechanism at zero
$last_update = 0;

// Start an endless loop
while (true) {
  // Get your bot's most recent updates from Telegram's servers
  $update = file_get_contents($url . 'getUpdates?offset=' . ($last_update + 1));
  // Convert the JSON into an object for ease of handling
  $update = json_decode($update);

  // Go through each pending update
  foreach ($update->result as $key => $update_item) {
    // Only act on the most-recent update
    if ($update_item->update_id > $last_update) {
      // Prepare the message chat_id and text
      $chat_id = $update_item->message->chat->id;
      $message = urlencode(
        'Update ID=' . $update_item->update_id . ', text = ' . $update_item->message->text
      );
      // Send the message via GET by constructing a URL
    	file_get_contents($url . "sendMessage?text=$message&chat_id=$chat_id");
      // Update the $last_update counter
      $last_update = $update_item->update_id;
    }
  }
  sleep(1);
}
