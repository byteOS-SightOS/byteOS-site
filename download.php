<?php
session_start();

if (!isset($_SESSION["byteos_auth"]) || $_SESSION["byteos_auth"] !== true) {
  http_response_code(403);
  exit("Access denied");
}

$file = "byteOS-microbit-alpha-0.1.1.hex";
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$file\"");
readfile($file);
exit;
