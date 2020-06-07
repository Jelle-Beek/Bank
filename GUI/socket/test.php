<?php
$host = "localhost";
$port = 665;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket\n");
$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");

$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");
echo "Listening for connections\n";

do {
    $accept = socket_accept($socket) or die("Could not accept incoming connection.");
    $msg = socket_read($accept, 1024) or die("Could not read input\n");

    $msg = json_decode($msg);

    echo "bericht = " . $msg->header->msg . "\n";
    echo "naam = " .$msg->header->name . "\n";
    echo "leeftijd = " .$msg->body->age . "\n";
    echo "email = " .$msg->body->email . "\n\n";

} while (true);

socket_close($socket);

?>
