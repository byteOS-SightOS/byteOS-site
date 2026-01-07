<?php
$PASSWORD_HASH = hash('sha256', 'firefly@360');

if (!isset($_POST['pass'])) {
    http_response_code(403);
    exit("Forbidden");
}

if (hash('sha256', $_POST['pass']) !== $PASSWORD_HASH) {
    http_response_code(401);
    exit("Wrong password");
}

$file = "../downloads/byteOS-alpha-0.1.1.hex";

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=byteOS-alpha-0.1.1.hex");
header("Content-Length: " . filesize($file));
readfile($file);
exit;
