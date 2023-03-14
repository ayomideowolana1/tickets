<?php
include ('../utils/conn.php');

include ('../classes/ticket.php');

$title = $_POST['title'];
$category = $_POST['category'];

$ticket = new Ticket($title,$category);
$ticket->create($conn);

header('Location: ../index.php');
