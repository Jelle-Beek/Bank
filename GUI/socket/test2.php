<?php
$host = "127.0.0.1";
$port = 665;

$json = array(
    "header" => array(
        "msg" => $_POST["bericht"],
        "name" => $_POST["name"],
    ),
    "body" => array(
        "age" => $_POST["age"],
        "email" => $_POST["email"]
    )
);

$msg = json_encode($json);

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket\n");
socket_connect($socket, $host, $port);

socket_send($socket, $msg, strlen($msg), MSG_DONTROUTE);


?>



<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
</head>
<body>

<h1>Batbank</h1>

<h2>msg</h2>

<form method="POST">
    <label>
        bericht:
        <input type="text" name="bericht" required/>
    </label>
    <label>
        naam:
        <input type="text" name="name" required/>
    </label>
    <label>
        leeftijd:
        <input type="text" name="age" required/>
    </label>
    <label>
        email:
        <input type="text" name="email" required/>
    </label>
    <input type="submit" value="Send"/>
</form>
</body>
</html>
