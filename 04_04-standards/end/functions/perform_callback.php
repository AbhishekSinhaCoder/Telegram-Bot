<?php
function perform_callback($update) {
  switch ($update->callback_query->data) {
    case 'other':
      forward_other($update);
      break;
  }
}
