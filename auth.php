<?php
session_start();

/* SHA-256 hash of: ########### */
$PASSWORD_HASH = "8bfa52b7a5b5b68db9a8c5b9e7a7b53cb0d08c5d8df7c56e8e64a96b86c09f8e";

$data = json_decode(file_get_contents("php://input"), true);
$input = hash("sha256", $data["password"] ?? "");

if ($input === $PASSWORD_HASH) {
  $_SESSION["byteos_auth"] = true;
  echo json_encode(["ok" => true]);
} else {
  echo json_encode(["ok" => false]);
}
